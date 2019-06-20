<?php
class bootstrapMigration {
    public function __construct()
    {
        $this->initializeTable();
    }
    public function initializeTable(){
        global $wpdb;
        $table_name = $wpdb->prefix.'bootstrapmigration';
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            //if table not in database. Create new table
            $charset_collate = $wpdb->get_charset_collate();
        
            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                field_x text NOT NULL,
                field_y text NOT NULL,
                UNIQUE KEY id (id)
            ) $charset_collate;";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
        }

    }
    function deleteTable(){
        global $wpdb;
        $table_name = $wpdb->prefix.'bootstrapmigration';
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
            //if table in database. Delete table.
            global $wpdb;
            $sql = "DROP TABLE IF EXISTS $table_name;";
            $wpdb->query($sql);
        }

    }
}
$invoke = new bootstrapMigration();
