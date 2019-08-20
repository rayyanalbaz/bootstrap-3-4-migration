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

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <p>This tool identifies all the classes that use Bootstrap 3.37 with the corresponding updated class in Bootstrap 4.</p>
    <p>You can <b>Update</b> or <b>Revert</b> a class using the buttons.</p>
    <?php
    require __DIR__ . '../../class-bootstrap-3-4-migration-admin-table.php';
    $report_table = new bootstrap_migration_report_table();
    $report_table->prepare_items();
    $report_table->display();
    ?>
</div>
