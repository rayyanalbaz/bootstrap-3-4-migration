<?php

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class bootstrap_migration_report_table extends WP_List_Table
{

    public function get_records()
    {
        global $wpdb;
        $report_name     = $wpdb->prefix . 'migration_report';
        $query = "SELECT * FROM $report_name";

        // Get the data
        $db_data = $wpdb->get_results($query, ARRAY_A);

        return $db_data;
    }

    public function column_default($item, $column_name)
    {
        switch( $column_name ) { 
<<<<<<< HEAD
            case 'post_title':
            case 'delta_counter':
=======
            case 'post_id':
>>>>>>> f123f571961ef242a5007832086e3b998b88eb73
            case 'old':
            case 'new':
            case 'created_by':
             return $item[ $column_name ];
            default:
             return print_r( $item, true ) ; //Show the whole array for troubleshooting 
          }
    }

    public function get_columns(){
        $columns = array(
<<<<<<< HEAD
          'post_title' => 'Post Title',
          'delta_counter' => 'Delta',
=======
          'post_id' => 'Post ID',
>>>>>>> f123f571961ef242a5007832086e3b998b88eb73
          'old'    => 'Old Class',
          'new'      => 'New Class',
          'created_by' => 'Created By'
        );
        return $columns;
      }


    public function no_items()
    {
        _e('No report entries have been found.');
    }

    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $this->get_records();
    }
}