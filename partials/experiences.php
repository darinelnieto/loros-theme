   
<?php
/**
 * 
 * Partial Name: experiences
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$experiences = new WP_Query(array('post_type' => 'Experiences', 'post_status' => 'publish', 'posts_per_page' => 8, 'order' => 'desc'));
?>
<section class="experiences-partial-d7c3f3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 text-center">
                <h2><?php if(get_bloginfo("language") == "en-US"): echo "Experiences"; else: echo "Experiencias"; endif; ?></h2>
                <div class="owl-carousel experiences">
                    <?php
                        if($experiences->have_posts()){
                            while($experiences->have_posts()){
                                $experiences->the_post();
                    ?>
                    <div class="experience">
                        <a href="<?= get_permalink(); ?>">
                            <img src="<?= get_field('feature_image', $experiences->ID)['url']; ?>" alt="<?= get_field('feature_image', $experiences->ID)['title']; ?>">
                            <div class="name">
                                <h3><?= the_title($experiences->ID); ?></h3>
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
        </div>
    </div>
</section>
                    