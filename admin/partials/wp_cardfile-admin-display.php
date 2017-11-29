<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       07.no
 * @since      1.0.0
 *
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/admin/partials
 */

$dir = str_replace('admin/partials/', '',plugin_dir_path( __FILE__ ));
require_once ($dir.'includes/class-wp_cardfile-users-list-table.php');
$class = new WP_Cardfile_Users_List_Table();

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1>Registrerte brukere</h1>
<?php echo $class->display();?>
