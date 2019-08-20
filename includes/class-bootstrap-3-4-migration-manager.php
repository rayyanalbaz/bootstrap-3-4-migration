<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
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
    { }
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

            $sql_insert = "INSERT INTO `wp_bootstrap_dictionary` (`id`, `old`, `new`, `created`) VALUES
            (2, 'panel', 'card', '2019-06-25 17:36:37'),
            (3, 'panel-heading', 'card-header', '0000-00-00 00:00:00'),
            (4, 'panel-title', 'card-title', '0000-00-00 00:00:00'),
            (5, 'panel-body', 'card-body', '0000-00-00 00:00:00'),
            (6, 'panel-footer', 'card-footer', '0000-00-00 00:00:00'),
            (7, 'panel-primary', 'card.bg-primary.text-white', '0000-00-00 00:00:00'),
            (8, 'panel-success', 'card.bg-success.text-white', '0000-00-00 00:00:00'),
            (9, 'panel-info', 'card.text-white.bg-info', '0000-00-00 00:00:00'),
            (10, 'panel-warning', 'card.bg-warning', '0000-00-00 00:00:00'),
            (11, 'panel-danger', 'card.bg-danger.text-white', '0000-00-00 00:00:00'),
            (12, 'well', 'card.card-body', '0000-00-00 00:00:00'),
            (13, 'thumbnail', 'card.card-body', '0000-00-00 00:00:00'),
            (14, 'list-inline > li', 'list-inline-item', '0000-00-00 00:00:00'),
            (15, 'dropdown-menu > li', 'dropdown-item', '0000-00-00 00:00:00'),
            (16, 'nav navbar > li', 'nav-item', '0000-00-00 00:00:00'),
            (17, 'nav navbar > li > a', 'nav-link', '0000-00-00 00:00:00'),
            (18, 'navbar-right', 'ml-auto', '0000-00-00 00:00:00'),
            (19, 'navbar-btn', 'nav-item', '0000-00-00 00:00:00'),
            (20, 'navbar-fixed-top', 'fixed-top', '0000-00-00 00:00:00'),
            (21, 'nav-stacked', 'flex-column', '0000-00-00 00:00:00'),
            (22, 'btn-default', 'btn-secondary', '0000-00-00 00:00:00'),
            (23, 'img-responsive', 'img-fluid', '0000-00-00 00:00:00'),
            (24, 'img-circle', 'rounded-circle', '0000-00-00 00:00:00'),
            (25, 'img-rounded', 'rounded', '0000-00-00 00:00:00'),
            (26, 'form-horizontal', 'removed)', '0000-00-00 00:00:00'),
            (27, 'radio', 'form-check', '0000-00-00 00:00:00'),
            (28, 'checkbox', 'form-check', '0000-00-00 00:00:00'),
            (29, 'input-lg', 'form-control-lg', '0000-00-00 00:00:00'),
            (30, 'input-sm', 'form-control-sm', '0000-00-00 00:00:00'),
            (31, 'control-label', 'col-form-label', '0000-00-00 00:00:00'),
            (32, 'table-condensed', 'table-sm', '0000-00-00 00:00:00'),
            (33, 'pagination > li', 'page-item', '0000-00-00 00:00:00'),
            (34, 'pagination > li > a', 'page-link', '0000-00-00 00:00:00'),
            (35, 'item', 'carousel-item', '0000-00-00 00:00:00'),
            (36, 'help-block', 'form-text', '0000-00-00 00:00:00'),
            (37, 'pull-right', 'float-right', '0000-00-00 00:00:00'),
            (38, 'pull-left', 'float-left', '0000-00-00 00:00:00'),
            (39, 'center-block', 'mx-auto.d-block', '0000-00-00 00:00:00'),
            (40, 'hidden-xs', 'd-none', '0000-00-00 00:00:00'),
            (41, 'hidden-sm', 'd-sm-none', '0000-00-00 00:00:00'),
            (42, 'hidden-md', 'd-md-none', '0000-00-00 00:00:00'),
            (43, 'hidden-lg', 'd-lg-none', '0000-00-00 00:00:00'),
            (44, 'visible-xs', 'd-block.d-sm-none', '0000-00-00 00:00:00'),
            (45, 'visible-sm', 'd-none.d-sm-block.d-md-none', '0000-00-00 00:00:00'),
            (46, 'visible-md', 'd-none.d-md-block.d-lg-none', '0000-00-00 00:00:00'),
            (47, 'visible-lg', 'd-none.d-lg-block.d-xl-none', '0000-00-00 00:00:00'),
            (48, 'label', 'badge', '0000-00-00 00:00:00'),
            (49, 'badge', 'badge.badge-pill', '0000-00-00 00:00:00'),
            (50, 'col-xs-offset-0', 'offset-0', '0000-00-00 00:00:00'),
            (51, 'col-xs-offset-1', 'offset-1', '0000-00-00 00:00:00'),
            (52, 'col-xs-offset-2', 'offset-2', '0000-00-00 00:00:00'),
            (53, 'col-xs-offset-3', 'offset-3', '0000-00-00 00:00:00'),
            (54, 'col-xs-offset-4', 'offset-4', '0000-00-00 00:00:00'),
            (55, 'col-xs-offset-5', 'offset-5', '0000-00-00 00:00:00'),
            (56, 'col-xs-offset-6', 'offset-6', '0000-00-00 00:00:00'),
            (57, 'col-xs-offset-7', 'offset-7', '0000-00-00 00:00:00'),
            (58, 'col-xs-offset-8', 'offset-8', '0000-00-00 00:00:00'),
            (59, 'col-xs-offset-9', 'offset-9', '0000-00-00 00:00:00'),
            (60, 'col-xs-offset-10', 'offset-10', '0000-00-00 00:00:00'),
            (61, 'col-xs-offset-11', 'offset-11', '0000-00-00 00:00:00'),
            (62, 'col-xs-offset-12', 'offset-12', '0000-00-00 00:00:00'),
            (63, 'col-sm-offset-0', 'offset-0', '0000-00-00 00:00:00'),
            (64, 'col-sm-offset-1', 'offset-1', '0000-00-00 00:00:00'),
            (65, 'col-sm-offset-2', 'offset-2', '0000-00-00 00:00:00'),
            (66, 'col-sm-offset-3', 'offset-3', '0000-00-00 00:00:00'),
            (67, 'col-sm-offset-4', 'offset-4', '0000-00-00 00:00:00'),
            (68, 'col-sm-offset-5', 'offset-5', '0000-00-00 00:00:00'),
            (69, 'col-sm-offset-6', 'offset-6', '0000-00-00 00:00:00'),
            (70, 'col-sm-offset-7', 'offset-7', '0000-00-00 00:00:00'),
            (71, 'col-sm-offset-8', 'offset-8', '0000-00-00 00:00:00'),
            (72, 'col-sm-offset-9', 'offset-9', '0000-00-00 00:00:00'),
            (73, 'col-sm-offset-10', 'offset-10', '0000-00-00 00:00:00'),
            (74, 'col-sm-offset-11', 'offset-11', '0000-00-00 00:00:00'),
            (75, 'col-sm-offset-12', 'offset-12', '0000-00-00 00:00:00'),
            (76, 'col-md-offset-0', 'offset-0', '0000-00-00 00:00:00'),
            (77, 'col-md-offset-1', 'offset-1', '0000-00-00 00:00:00'),
            (78, 'col-md-offset-2', 'offset-2', '0000-00-00 00:00:00'),
            (79, 'col-md-offset-3', 'offset-3', '0000-00-00 00:00:00'),
            (80, 'col-md-offset-4', 'offset-4', '0000-00-00 00:00:00'),
            (81, 'col-md-offset-5', 'offset-5', '0000-00-00 00:00:00'),
            (82, 'col-md-offset-6', 'offset-6', '0000-00-00 00:00:00'),
            (83, 'col-md-offset-7', 'offset-7', '0000-00-00 00:00:00'),
            (84, 'col-md-offset-8', 'offset-8', '0000-00-00 00:00:00'),
            (85, 'col-md-offset-9', 'offset-9', '0000-00-00 00:00:00'),
            (86, 'col-md-offset-10', 'offset-10', '0000-00-00 00:00:00'),
            (87, 'col-md-offset-11', 'offset-11', '0000-00-00 00:00:00'),
            (88, 'col-md-offset-12', 'offset-12', '0000-00-00 00:00:00'),
            (89, 'col-lg-offset-0', 'offset-0', '0000-00-00 00:00:00'),
            (90, 'col-lg-offset-1', 'offset-1', '0000-00-00 00:00:00'),
            (91, 'col-lg-offset-2', 'offset-2', '0000-00-00 00:00:00'),
            (92, 'col-lg-offset-3', 'offset-3', '0000-00-00 00:00:00'),
            (93, 'col-lg-offset-4', 'offset-4', '0000-00-00 00:00:00'),
            (94, 'col-lg-offset-5', 'offset-5', '0000-00-00 00:00:00'),
            (95, 'col-lg-offset-6', 'offset-6', '0000-00-00 00:00:00'),
            (96, 'col-lg-offset-7', 'offset-7', '0000-00-00 00:00:00'),
            (97, 'col-lg-offset-8', 'offset-8', '0000-00-00 00:00:00'),
            (98, 'col-lg-offset-9', 'offset-9', '0000-00-00 00:00:00'),
            (99, 'col-lg-offset-10', 'offset-10', '0000-00-00 00:00:00'),
            (100, 'col-lg-offset-11', 'offset-11', '0000-00-00 00:00:00'),
            (101, 'col-lg-offset-12', 'offset-12', '0000-00-00 00:00:00'),
            (102, 'col-xs-push-0', 'order-0', '0000-00-00 00:00:00'),
            (103, 'col-xs-push-1', 'order-1', '0000-00-00 00:00:00'),
            (104, 'col-xs-push-2', 'order-2', '0000-00-00 00:00:00'),
            (105, 'col-xs-push-3', 'order-3', '0000-00-00 00:00:00'),
            (106, 'col-xs-push-4', 'order-4', '0000-00-00 00:00:00'),
            (107, 'col-xs-push-5', 'order-5', '0000-00-00 00:00:00'),
            (108, 'col-xs-push-6', 'order-6', '0000-00-00 00:00:00'),
            (109, 'col-xs-push-7', 'order-7', '0000-00-00 00:00:00'),
            (110, 'col-xs-push-8', 'order-8', '0000-00-00 00:00:00'),
            (111, 'col-xs-push-9', 'order-9', '0000-00-00 00:00:00'),
            (112, 'col-xs-push-10', 'order-10', '0000-00-00 00:00:00'),
            (113, 'col-xs-push-11', 'order-11', '0000-00-00 00:00:00'),
            (114, 'col-xs-push-12', 'order-12', '0000-00-00 00:00:00'),
            (115, 'col-xs-pull-0', 'order-0', '0000-00-00 00:00:00'),
            (116, 'col-xs-pull-1', 'order-1', '0000-00-00 00:00:00'),
            (117, 'col-xs-pull-2', 'order-2', '0000-00-00 00:00:00'),
            (118, 'col-xs-pull-3', 'order-3', '0000-00-00 00:00:00'),
            (119, 'col-xs-pull-4', 'order-4', '0000-00-00 00:00:00'),
            (120, 'col-xs-pull-5', 'order-5', '0000-00-00 00:00:00'),
            (121, 'col-xs-pull-6', 'order-6', '0000-00-00 00:00:00'),
            (122, 'col-xs-pull-7', 'order-7', '0000-00-00 00:00:00'),
            (123, 'col-xs-pull-8', 'order-8', '0000-00-00 00:00:00'),
            (124, 'col-xs-pull-9', 'order-9', '0000-00-00 00:00:00'),
            (125, 'col-xs-pull-10', 'order-10', '0000-00-00 00:00:00'),
            (126, 'col-xs-pull-11', 'order-11', '0000-00-00 00:00:00'),
            (127, 'col-xs-pull-12', 'order-12', '0000-00-00 00:00:00'),
            (128, 'col-sm-push-0', 'order-sm-0', '0000-00-00 00:00:00'),
            (129, 'col-sm-push-1', 'order-sm-1', '0000-00-00 00:00:00'),
            (130, 'col-sm-push-2', 'order-sm-2', '0000-00-00 00:00:00'),
            (131, 'col-sm-push-3', 'order-sm-3', '0000-00-00 00:00:00'),
            (132, 'col-sm-push-4', 'order-sm-4', '0000-00-00 00:00:00'),
            (133, 'col-sm-push-5', 'order-sm-5', '0000-00-00 00:00:00'),
            (134, 'col-sm-push-6', 'order-sm-6', '0000-00-00 00:00:00'),
            (135, 'col-sm-push-7', 'order-sm-7', '0000-00-00 00:00:00'),
            (136, 'col-sm-push-8', 'order-sm-8', '0000-00-00 00:00:00'),
            (137, 'col-sm-push-9', 'order-sm-9', '0000-00-00 00:00:00'),
            (138, 'col-sm-push-10', 'order-sm-10', '0000-00-00 00:00:00'),
            (139, 'col-sm-push-11', 'order-sm-11', '0000-00-00 00:00:00'),
            (140, 'col-sm-push-12', 'order-sm-12', '0000-00-00 00:00:00'),
            (141, 'col-sm-pull-0', 'order-sm-0', '0000-00-00 00:00:00'),
            (142, 'col-sm-pull-1', 'order-sm-1', '0000-00-00 00:00:00'),
            (143, 'col-sm-pull-2', 'order-sm-2', '0000-00-00 00:00:00'),
            (144, 'col-sm-pull-3', 'order-sm-3', '0000-00-00 00:00:00'),
            (145, 'col-sm-pull-4', 'order-sm-4', '0000-00-00 00:00:00'),
            (146, 'col-sm-pull-5', 'order-sm-5', '0000-00-00 00:00:00'),
            (147, 'col-sm-pull-6', 'order-sm-6', '0000-00-00 00:00:00'),
            (148, 'col-sm-pull-7', 'order-sm-7', '0000-00-00 00:00:00'),
            (149, 'col-sm-pull-8', 'order-sm-8', '0000-00-00 00:00:00'),
            (150, 'col-sm-pull-9', 'order-sm-9', '0000-00-00 00:00:00'),
            (151, 'col-sm-pull-10', 'order-sm-10', '0000-00-00 00:00:00'),
            (152, 'col-sm-pull-11', 'order-sm-11', '0000-00-00 00:00:00'),
            (153, 'col-sm-pull-12', 'order-sm-12', '0000-00-00 00:00:00'),
            (154, 'col-md-push-0', 'order-md-0', '0000-00-00 00:00:00'),
            (155, 'col-md-push-1', 'order-md-1', '0000-00-00 00:00:00'),
            (156, 'col-md-push-2', 'order-md-2', '0000-00-00 00:00:00'),
            (157, 'col-md-push-3', 'order-md-3', '0000-00-00 00:00:00'),
            (158, 'col-md-push-4', 'order-md-4', '0000-00-00 00:00:00'),
            (159, 'col-md-push-5', 'order-md-5', '0000-00-00 00:00:00'),
            (160, 'col-md-push-6', 'order-md-6', '0000-00-00 00:00:00'),
            (161, 'col-md-push-7', 'order-md-7', '0000-00-00 00:00:00'),
            (162, 'col-md-push-8', 'order-md-8', '0000-00-00 00:00:00'),
            (163, 'col-md-push-9', 'order-md-9', '0000-00-00 00:00:00'),
            (164, 'col-md-push-10', 'order-md-10', '0000-00-00 00:00:00'),
            (165, 'col-md-push-11', 'order-md-11', '0000-00-00 00:00:00'),
            (166, 'col-md-push-12', 'order-md-12', '0000-00-00 00:00:00'),
            (167, 'col-md-pull-0', 'order-md-0', '0000-00-00 00:00:00'),
            (168, 'col-md-pull-1', 'order-md-1', '0000-00-00 00:00:00'),
            (169, 'col-md-pull-2', 'order-md-2', '0000-00-00 00:00:00'),
            (170, 'col-md-pull-3', 'order-md-3', '0000-00-00 00:00:00'),
            (171, 'col-md-pull-4', 'order-md-4', '0000-00-00 00:00:00'),
            (172, 'col-md-pull-5', 'order-md-5', '0000-00-00 00:00:00'),
            (173, 'col-md-pull-6', 'order-md-6', '0000-00-00 00:00:00'),
            (174, 'col-md-pull-7', 'order-md-7', '0000-00-00 00:00:00'),
            (175, 'col-md-pull-8', 'order-md-8', '0000-00-00 00:00:00'),
            (176, 'col-md-pull-9', 'order-md-9', '0000-00-00 00:00:00'),
            (177, 'col-md-pull-10', 'order-md-10', '0000-00-00 00:00:00'),
            (178, 'col-md-pull-11', 'order-md-11', '0000-00-00 00:00:00'),
            (179, 'col-md-pull-12', 'order-md-12', '0000-00-00 00:00:00'),
            (180, 'col-lg-push-0', 'order-lg-0', '0000-00-00 00:00:00'),
            (181, 'col-lg-push-1', 'order-lg-1', '0000-00-00 00:00:00'),
            (182, 'col-lg-push-2', 'order-lg-2', '0000-00-00 00:00:00'),
            (183, 'col-lg-push-3', 'order-lg-3', '0000-00-00 00:00:00'),
            (184, 'col-lg-push-4', 'order-lg-4', '0000-00-00 00:00:00'),
            (185, 'col-lg-push-5', 'order-lg-5', '0000-00-00 00:00:00'),
            (186, 'col-lg-push-6', 'order-lg-6', '0000-00-00 00:00:00'),
            (187, 'col-lg-push-7', 'order-lg-7', '0000-00-00 00:00:00'),
            (188, 'col-lg-push-8', 'order-lg-8', '0000-00-00 00:00:00'),
            (189, 'col-lg-push-9', 'order-lg-9', '0000-00-00 00:00:00'),
            (190, 'col-lg-push-10', 'order-lg-10', '0000-00-00 00:00:00'),
            (191, 'col-lg-push-11', 'order-lg-11', '0000-00-00 00:00:00'),
            (192, 'col-lg-push-12', 'order-lg-12', '0000-00-00 00:00:00'),
            (193, 'col-lg-pull-0', 'order-lg-0', '0000-00-00 00:00:00'),
            (194, 'col-lg-pull-1', 'order-lg-1', '0000-00-00 00:00:00'),
            (195, 'col-lg-pull-2', 'order-lg-2', '0000-00-00 00:00:00'),
            (196, 'col-lg-pull-3', 'order-lg-3', '0000-00-00 00:00:00'),
            (197, 'col-lg-pull-4', 'order-lg-4', '0000-00-00 00:00:00'),
            (198, 'col-lg-pull-5', 'order-lg-5', '0000-00-00 00:00:00'),
            (199, 'col-lg-pull-6', 'order-lg-6', '0000-00-00 00:00:00'),
            (200, 'col-lg-pull-7', 'order-lg-7', '0000-00-00 00:00:00'),
            (201, 'col-lg-pull-8', 'order-lg-8', '0000-00-00 00:00:00'),
            (202, 'col-lg-pull-9', 'order-lg-9', '0000-00-00 00:00:00'),
            (203, 'col-lg-pull-10', 'order-lg-10', '0000-00-00 00:00:00'),
            (204, 'col-lg-pull-11', 'order-lg-11', '0000-00-00 00:00:00'),
            (205, 'col-lg-pull-12', 'order-lg-12', '0000-00-00 00:00:00');
            ";
            dbDelta($sql_insert);
        }

        if ($wpdb->get_var("SHOW TABLES LIKE '$report_name'") != $report_name) {
            //if table not in database. Create new table
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $report_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                post_id varchar(100) NOT NULL,
                post_title varchar(100) NOT NULL,
                delta_counter int(10) NOT NULL,
                old varchar(100) NOT NULL,
                new varchar(100) NOT NULL,
                time_created varchar(50) NOT NULL,
                created_by varchar(50) NULL,
                status varchar(50) NULL default 'unchanged',
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
     * Empty the table in the database if it exists.
     *
     * @since    1.0.0
     */
    public function empty_table()
    {
        global $wpdb;
        $report_table_name = $wpdb->prefix . 'migration_report';
        if ($wpdb->get_var("SHOW TABLES LIKE '$report_table_name'") == $report_table_name) {
            $sql = "TRUNCATE `$report_table_name`";
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
    public function report_change($page_id, $old, $new, $delta)
    {
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        global $wpdb;
        $table_name   = $wpdb->prefix . 'migration_report';
        $time         = time();
        $current_user = wp_get_current_user();
        $page_title = get_the_title($page_id);
        $result = $wpdb->query("SELECT id FROM $table_name WHERE old = '$old'");
        if ($result == 0) {
            $sql = "INSERT INTO $table_name ( post_id,post_title, delta_counter, old, new, time_created, created_by )
            VALUES ( '$page_id','$page_title','$delta', '$old', '$new', '$time', '$current_user->user_login');";
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
        global $wpdb ; 
        $querystr = "SELECT * FROM $wpdb->posts";
        foreach( $wpdb->get_results($querystr) as $key => $row) {
            if($row->post_type == 'page'){
                $post_id = $row->ID;
                $content = $row->post_content;
                $dictionary = $this->read_all();
                require_once('simple_html_dom.php');
                $html = str_get_html($content);
                
                if ($html) {
                    foreach ($dictionary as $entry) {
                        $delta = 0;
                        $to_replace = '.' . $entry["old"];
                        $find = $html->find($to_replace);
                        foreach ($find as $element) {
                            if (sizeof($find) > 0) {
                                $delta = sizeof($find);
                                $string = $element->class;
                                $element->class = str_replace($entry["old"], $entry["new"], $string);
                                $this->report_change($post_id, $entry["old"], $entry["new"], $delta);
                            }
                        }
                    }
                }
            }
        }   
    }
    /**
     * Updates the class to NEW value from the database dictionary in the post database.
     *
     * @since    1.0.0
     */
    public function update_class($id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'migration_report';
        $query = "SELECT * FROM $table_name WHERE id = '$id'";
        $result = $wpdb->get_row($query, ARRAY_A);
        $content = get_post_field('post_content', $result['post_id']);
        $modified_content = str_replace($result['old'], $result['new'], $content);
        $updated_post = array(
            'ID' => $result['post_id'],
            'post_content' => $modified_content,
        );
        wp_update_post($updated_post, true);
        if (is_wp_error($result['post_id'])) {
            $errors = $result['post_id']->get_error_messages();
            foreach ($errors as $error) {
                echo $error;
            }
        }

        $sql = "UPDATE $table_name SET status = 'updated' WHERE id = '$id';";
        $wpdb->query($sql);
    }
    /**
     * Reverts the class to OLD value from the database dictionary in the post database.
     *
     * @since    1.0.0
     */
    public function revert_class($id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'migration_report';
        $query = "SELECT * FROM $table_name WHERE id = '$id'";
        $result = $wpdb->get_row($query, ARRAY_A);
        $content = get_post_field('post_content', $result['post_id']);
        $modified_content = str_replace($result['new'], $result['old'], $content);
        $updated_post = array(
            'ID' => $result['post_id'],
            'post_content' => $modified_content,
        );
        wp_update_post($updated_post, true);
        if (is_wp_error($result['post_id'])) {
            $errors = $result['post_id']->get_error_messages();
            foreach ($errors as $error) {
                echo $error;
            }
        }
        $sql = "UPDATE $table_name SET status = 'reverted' WHERE id = '$id';";
        $wpdb->query($sql);
    }
}
