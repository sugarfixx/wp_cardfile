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
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
global $current_user ;
get_current_user();

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

if ($atts['view'] == 'registration') {
    require_once ('register_form.php');
} else {
    require_once ('update_form.php');
}

?>
