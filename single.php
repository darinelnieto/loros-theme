<?php
/**
 * 
 * Default single.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$posttype = get_post_type(); 
switch ($posttype) {
	case 'experiences':
		get_template_part('templates/experiences-template');
	break;
	case 'relato':
		get_template_part('templates/single-strory-template');
	break;
	case 'logbook':
		get_template_part('templates/experiences-template');
	break;
	case 'donate':
		get_template_part('templates/experiences-template');
	break;
}
?>