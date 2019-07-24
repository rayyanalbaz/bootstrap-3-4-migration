<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://bitbucket.org/1101c/
 * @since      1.0.0
 *
 * @package    Bootstrap_3_4_Migration
 * 
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Bootstrap_3_4_Migration
 * @author     Rayyan Albaz <rayyan95@my.yorku.ca>
 */
class bootstrap_migration
{
    
    public function __construct()
    {
    }
    /**
     * initialize the table in the database if it doesn't exists.
     *
     * @since    1.0.0
     */
    public function initialize_table()
    {
        global $wpdb;
        $dictionary_name = $wpdb->prefix . 'bootstrap_dictionary';
        $report_name     = $wpdb->prefix . 'migration_report';
        
        if ($wpdb->get_var("SHOW TABLES LIKE '$dictionary_name'") != $dictionary_name) {
            //if table not in database. Create new table
            $charset_collate = $wpdb->get_charset_collate();
            
            $sql = "CREATE TABLE $dictionary_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                old varchar(100) NOT NULL,
                new varchar(100) NOT NULL,
                created varchar(50) NOT NULL,
                last_modified varchar(50) NOT NULL,
                created_by varchar(50) NOT NULL,
                updated_by varchar(50),
                UNIQUE KEY id (id)
            ) $charset_collate;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
        
        if ($wpdb->get_var("SHOW TABLES LIKE '$report_name'") != $report_name) {
            //if table not in database. Create new table
            $charset_collate = $wpdb->get_charset_collate();
            
            $sql = "CREATE TABLE $report_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                post_id mediumint(9) NOT NULL,
                old varchar(100) NOT NULL,
                new varchar(100) NOT NULL,
                time_created varchar(50) NOT NULL,
                created_by varchar(50) NULL,
                UNIQUE KEY id (id)
            ) $charset_collate;";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
    /**
     * Delete the table in the database if it exists.
     *
     * @since    1.0.0
     */
    public function delete_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'bootstrap_dictionary';
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
            //if table in database. Delete table.
            global $wpdb;
            $sql = "DROP TABLE IF EXISTS $table_name;";
            $wpdb->query($sql);
        }
        $report_table_name = $wpdb->prefix . 'migration_report';
        if ($wpdb->get_var("SHOW TABLES LIKE '$report_table_name'") == $report_table_name) {
            //if table in database. Delete table.
            global $wpdb;
            $sql = "DROP TABLE IF EXISTS $report_table_name;";
            $wpdb->query($sql);
        }
    }
    /**
     * Adds an entry to the dictionary.
     *
     * @since    1.0.0
     */
    public function add_dictionary($old, $new)
    {
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        global $wpdb;
        $table_name   = $wpdb->prefix . 'bootstrap_dictionary';
        $time         = time();
        $current_user = wp_get_current_user();
        
        $result = $wpdb->query("SELECT id FROM $table_name WHERE old = '$old'");
        if ($result == 0) {
            $sql = "INSERT INTO $table_name ( old, new, created, last_modified, created_by )
            VALUES ( '$old', '$new', '$time', '$time', '$current_user->user_login');";
            $wpdb->query($sql);
        }
    }
    /**
     * Returns all entries with the given id.
     *
     * @since    1.0.0
     */
    public function read_by_id($id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'bootstrap_dictionary';
        $result     = $wpdb->get_row("SELECT * FROM $table_name WHERE id = '$id'", ARRAY_A, 0);
        return $result;
    }
    /**
     * Returns all entries with the given OLD value.
     *
     * @since    1.0.0
     */
    public function read_by_old($old)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'bootstrap_dictionary';
        $result     = $wpdb->get_row("SELECT * FROM $table_name WHERE old = '$old'", ARRAY_A, 0);
        return $result;
    }
    /**
     * Returns all entries in the dictionary.
     *
     * @since    1.0.0
     */
    public function read_all()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'bootstrap_dictionary';
        $result     = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A, 0);
        return $result;
    }
    /**
     * Updates a dictionary entry.
     *
     * @since    1.0.0
     */
    public function update_dictionary($id, $old, $new)
    {
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        global $wpdb;
        $table_name   = $wpdb->prefix . 'bootstrap_dictionary';
        $time         = time();
        $current_user = wp_get_current_user();
        
        $sql = "UPDATE $table_name
        SET old = '$old', new= '$new', last_modified = '$time', updated_by = '$current_user->user_login'
        WHERE id = '$id';";
        $wpdb->query($sql);
    }
    /**
     * Reports a change to the database if it does not exist.
     *
     * @since    1.0.0
     */
    public function report_change($page_id, $old, $new)
    {
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        global $wpdb;
        $table_name   = $wpdb->prefix . 'migration_report';
        $time         = time();
        $current_user = wp_get_current_user();
        
        $result = $wpdb->query("SELECT id FROM $table_name WHERE old = '$old'");
        if ($result == 0) {
            $sql = "INSERT INTO $table_name ( post_id, old, new, time_created, created_by )
            VALUES ( '$page_id', '$old', '$new', '$time', '$current_user->user_login');";
            $wpdb->query($sql);
        }
    }
    /**
     * Upgrades the current page classes to NEW value from the database dictionary.
     *
     * @since    1.0.0
     */
    public function upgrade_class()
    {
        global $post;
        if ($post) {
            $post_id       = $post->ID;
            $thing_content = get_post_field('post_content', $post_id);
            error_log($thing_content);
            
            $dictionary = $this->read_all();
            require_once('simple_html_dom.php');
            $html = str_get_html($thing_content);
            
            if ($html) {
                for ($i = 0; $i < sizeof($dictionary); $i++) {
                    $find = $html->find('.' . $dictionary[$i]["old"]);
                    
                    foreach ($find as $element) {
                        if ($element->class == $dictionary[$i]["old"]) {
                            $element->class = $dictionary[$i]["new"];
                            $this->report_change($post_id, $dictionary[$i]["old"], $dictionary[$i]["new"]);
                        }
                    }
                }
                $str = $html->save();
                error_log($str);
                return $str;
            }
        }
    }
}