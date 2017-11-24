<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       07.no
 * @since      1.0.0
 *
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/public/partials
 */
$unit_options = [
    'Kolbotn IL',
    'Oppegård IL',
    'Nordby IL',
    'Langhus IL',
    'Enebakk IF',
    'Ljan Fotball',
    'Nordstrand IL',
    'Huketo IF',
    'Follo Dansestudio',
    'Friskis&Svettis',
    'Ski Bryteklubb',
    'Lørenskog Bryteklubb',
    'OCR Norway',
    'Norges bryteforbund',
    'Norges håndballforbund',
    'Norges fotballforbund'
];
$branch_options = [
    'Fotball',
    'Håndball',
    'Svømming',
    'Turn/RG',
    'Basketball',
    'Volleyball',
    'Amerikansk fotball',
    'Vannpolo',
    'Skigruppa',
    'Bryting',
    'Friidrett',
    'Barneidrett',
    'Tilrettelagt idrett',
    'Orientering',
    'Seniorgruppe',
    'Bordtennis',
    'Badminton',
    'Sykkel',
    'Triathlon',
    'Tennis'
];

global $current_user ;
$user = get_current_user();
global $wpdb;
$parent = $wpdb->get_results( 'SELECT  * FROM wp_cardfile_users WHERE wp_user_id = 2', OBJECT_K);
$children = $wpdb->get_results( 'SELECT  * FROM wp_cardfile_users WHERE parent_id = 2', OBJECT_K);




?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

if ($atts['view'] == 'registration') {

    $registration_form = get_template_directory().'/wp_cardfile/registration_form.php';
    if ( !file_exists($registration_form) ) {
        $registration_form = 'registration_form.php';
    }
    require_once( $registration_form );
}
else {

    $update_form = get_template_directory().'/wp_cardfile/update_form.php';
    if (!file_exists($update_form)) {
        $update_form = 'update_form.php';
    }
    require_once ( $update_form );
}

?>
