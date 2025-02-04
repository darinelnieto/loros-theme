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
}
?>