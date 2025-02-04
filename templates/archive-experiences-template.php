   
<?php
/**
 * 
 * Template Name: archive-experiences
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$experiences = new WP_Query(array('post_type' => 'Experiences', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'desc'));
?>
<main id="archive-experiences-template-dc1f40">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-5 mt-5">
                    <h1><?= the_title(); ?></h1>
                </div>
                <?php
                        if($experiences->have_posts()){
                            while($experiences->have_posts()){
                                $experiences->the_post();
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 experience">
                        <a href="<?= get_permalink(); ?>">
                            <div class="card-experience">
                                <div class="content-image">
                                    <img src="<?= get_field('feature_image', $experiences->ID)['url']; ?>" alt="<?= get_field('feature_image', $experiences->ID)['title']; ?>">
                                </div>
                                <div class="name">
                                    <h3><?= the_title($experiences->ID); ?></h3>
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
                    