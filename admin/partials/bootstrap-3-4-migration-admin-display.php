<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://bitbucket.org/1101c/
 * @since      1.0.0
 *
 * @package    Bootstrap_3_4_Migration
 * @subpackage Bootstrap_3_4_Migration/admin/partials
 */
?>

<?php
if (!empty($_GET['message'])) {


    if ($_GET['message'] == 1) {
        if (get_option('bootstrap_update', 'success') == 'success') {
            echo    '<div class="notice notice-success is-dismissible">';
            echo    '<p>';
            echo    'Class has been updated.';
            echo    '</p>';
            echo    '</div>';
        } else if (get_option('bootstrap_update', 'success') == 'fail') {

            echo    '<div class="notice notice-error is-dismissible">';
            echo    '<p>';
            echo    'An error occurred.';
            echo    '</p>';
            echo    '</div>';
        }
        delete_option('bootstrap_update');
    } else if ($_GET['message'] == 2) {
        if (get_option('bootstrap_revert', 'success') == 'success') {
            echo    '<div class="notice notice-warning is-dismissible">';
            echo    '<p>';
            echo    'Class has been reverted.';
            echo    '</p>';
            echo    '</div>';
        } else if (get_option('bootstrap_revert', 'success') == 'fail') {
            echo    '<div class="notice notice-error is-dismissible">';
            echo    '<p>';
            echo    'An error occurred.';
            echo    '</p>';
            echo    '</div>';
        }
        delete_option('bootstrap_revert');
    }
}

?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <p>This tool identifies all the classes that use Bootstrap 3.3.7 with the corresponding updated class in Bootstrap 4.</p>
    <p>You can <b style="color: green;">Update</b> or <b style="color: red;">Revert</b> a class using the buttons.</p>
    <?php
    require __DIR__ . '../../class-bootstrap-3-4-migration-admin-table.php';
    $report_table = new bootstrap_migration_report_table();
    $report_table->prepare_items();

    ?>
    <form id="users-settings" method="POST">
        <!-- For plugins, we also need to ensure that the form posts back to our current page -->
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
        <!-- Now we can render the completed list table -->
        <?php $report_table->display(); ?>
    </form>
</div>