   
<?php
/**
 * 
 * Template Name: about-us-page
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
?>
<main id="about-us-page-template-e82d05">
    <!-- Generic banner -->
    <?php get_template_part('partials/banner-generic'); ?>
    <!-- Abouts us -->
    <?php get_template_part('partials/about-us'); ?>
    <!-- Welcome about us content -->
    <section class="content-welcome">
        <div class="content-image">
            <img src="<?= get_field('welcome_image')['url']; ?>" alt="<?= get_field('welcome_image')['title']; ?>">
        </div>
        <div class="content-text">
            <h2 class="mb-4"><?= get_field('welcome_title'); ?></h2>
            <p class="mb-4"><?= get_field('welcome_description'); ?></p>
            <a href="<?= get_field('location_link'); ?>" target="_blank">
                <?php if(get_bloginfo("language") == "en-US"): echo "HOW TO GET THERE"; else: echo "COMO LLEGAR"; endif; ?>
            </a>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    