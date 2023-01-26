   
<?php
/**
 * 
 * Template Name: home
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="home-template-d7ea1e">
    <!-- Banner -->
    <?php get_template_part('partials/banner-home'); ?>
    <!-- Abouts us -->
    <?php get_template_part('partials/about-us'); ?>
    <!-- Regenerative agriculture -->
    <?php get_template_part('partials/regenerative-agriculture'); ?>
    <!-- Forest nursery -->
    <?php get_template_part('partials/forest-nursery'); ?>
    <!-- Experiences -->
    <?php get_template_part('partials/experiences'); ?>
</main>
<?php get_footer(); ?>
                    