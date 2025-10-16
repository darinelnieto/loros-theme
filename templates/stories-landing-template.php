   
<?php
/**
 * 
 * Template Name: stories-landing
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$stories = get_field('stories');
$banner = get_field('banner_image');
$text = get_field('text_after_title');
?>
<main id="stories-landing-template-48285e">
    <section class="banner">
        <img src="<?= $banner['url']; ?>" alt="<?= $banner['title']; ?>" width="<?= $banner['width']; ?>" height="<?= $banner['height']; ?>" class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?= the_title(); ?></h1>
                    <p><?= $text; ?></p>
                </div>
            </div>
        </div>
    </section>
    <?php if($stories): ?>
        <section class="stories">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="selection-methods">
                            <?= get_field('selection_methods'); ?>
                        </div>
                    </div>
                    <?php foreach($stories as $story): ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <a href="<?= get_permalink($story['story']->ID); ?>" class="card-story">
                                <div class="card-posts">
                                    <div class="image-contain">
                                        <img src="<?= get_the_post_thumbnail_url($story['story']->ID); ?>" alt="<?= get_the_title($story['story']->ID); ?>">
                                    </div>
                                    <div class="text-contain">
                                        <h3 class="name-post"><?= get_the_title($story['story']->ID); ?></h3>
                                        <p class="description"><?= get_field('short_description', $story['story']->ID); ?></p>
                                        <p class="label-text"><strong class="label"><?= get_field('author_label', 'option'); ?>:</strong> <?= get_field('author', $story['story']->ID); ?></p>
                                        <p class="label-text"><strong class="label"><?= get_field('location_label', 'option'); ?>:</strong> 
                                        <?php if(get_the_terms($story['story']->ID, 'country_cat')): echo get_the_terms($story['story']->ID, 'country_cat')[0]->name; endif; if(get_the_terms($story['story']->ID, 'city_cat')): echo ' - ' . get_the_terms($story['story']->ID, 'city_cat')[0]->name; endif; ?></p>
                                        <?php if(get_the_terms($story['story']->ID, 'ecosystem_cat')): ?>
                                            <p class="label-text"><strong class="label"><?= get_field('species_label', 'option'); ?>:</strong> <?= get_the_terms($story['story']->ID, 'ecosystem_cat')[0]->name; ?></p>
                                        <?php endif; ?>
                                        <p class="label-text"><strong class="label"><?= get_field('date_label', 'option'); ?>:</strong> <?= get_the_date('Y-m-d', $story['story']->ID); ?></p>
                                        <span class="read-more-text"><?= get_field('cta_text', 'option'); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div> 
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
                    