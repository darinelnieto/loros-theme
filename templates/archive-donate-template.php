   
<?php
/**
 * 
 * Template Name: archive-donate
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$experiences = new WP_Query(array('post_type' => 'donate', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'desc'));
$banner = get_field('banner_image');
$text = get_field('text_after_title');
?>
<main id="archive-donate-template-220031">
    <section class="banner">
        <img src="<?= $banner['url']; ?>" alt="<?= $banner['title']; ?>" class="banner" loading="lazy">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?= the_title(); ?></h1>
                    <p><?= $text; ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="stories">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                    if($experiences->have_posts()){
                        while($experiences->have_posts()){
                            $experiences->the_post();
                            $img = get_field('feature_image', $experiences->ID);
                ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <a href="<?= get_permalink(); ?>" class="card-story">
                        <div class="card-posts">
                            <div class="image-contain">
                                <img src="<?= $img['url']; ?>" alt="<?= $img['title']; ?>" loading="lazy">
                            </div>
                            <div class="text-contain">
                                <h3 class="name-post"><?= the_title($experiences->ID); ?></h3>
                                <p class="description"><?= get_field('shortdescription', $experiences->ID); ?></p>
                                <p class="label-text"><strong class="label"><?= get_field('date_label', 'option'); ?>:</strong> <?= get_the_date('Y-m-d', $experiences->ID); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                        };
                        wp_reset_postdata();
                    };
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    