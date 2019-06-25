<?php
class bootstrapMigration {

    public function __construct()
    {
    }
    function initialize_table(){
        global $wpdb;
        $table_name = $wpdb->prefix.'bootstrap_dictionary';
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            //if table not in database. Create new table
            $charset_collate = $wpdb->get_charset_collate();
        
            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                old text NOT NULL,
                new text NOT NULL,
                created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE KEY id (id)
            ) $charset_collate;";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
        }
    }
    function delete_table(){
        global $wpdb;
        $table_name = $wpdb->prefix.'bootstrap_dictionary';
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
            //if table in database. Delete table.
            global $wpdb;
            $sql = "DROP TABLE IF EXISTS $table_name;";
            $wpdb->query($sql);
        }
    }
    function add_dictionary($old,$new){
        global $wpdb;
        $table_name = $wpdb->prefix.'bootstrap_dictionary';
        $time = time();

        $result = $wpdb->query("SELECT id FROM $table_name WHERE old = '$old'");
        if($result == 0) {
            $sql = "INSERT INTO $table_name ( old, new, created)
            VALUES ( '$old', '$new', '$time');";
            $wpdb->query($sql);
        }
    }
    function read_by_id($id){
        global $wpdb;
        $table_name = $wpdb->prefix.'bootstrap_dictionary';
        $result =  $wpdb->get_row("SELECT * FROM $table_name WHERE id = '$id'", ARRAY_A , 0);
        return $result;
    }
    function read_by_old($old){
        global $wpdb;
        $table_name = $wpdb->prefix.'bootstrap_dictionary';
        $result =  $wpdb->get_row("SELECT * FROM $table_name WHERE old = '$old'", ARRAY_A , 0);
        return $result;
    }
}