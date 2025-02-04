   
<?php
/**
 * 
 * Template Name: general
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$image = get_field('image');
$add_position = get_field('image_on_the_edge');
?>
<main id="general-template-0c7945">
    <!-- Generic banner -->
    <?php get_template_part('partials/banner-generic'); ?>
    <!-- content description -->
    <section class="generic-content <?php if($add_position === false): ?>pb-5<?php endif ?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 d-none d-md-block <?php if($add_position === true): ?>content-image<?php else: ?>normal<?php endif; ?>">
                    <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
                </div>
                <div class="col-12 col-md-6 <?php if($add_position === true): ?>content-texts<?php else: ?>text-normal<?php endif; ?>">
                    <h1><?= get_field('title') ?></h1>
                    <p><?= get_field('description'); ?></p>
                </div>
                <div class="col-12 d-md-none <?php if($add_position === true): ?>content-image<?php else: ?>normal<?php endif; ?>">
                    <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    