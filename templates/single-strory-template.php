   
<?php
/**
 * 
 * Template Name: single-strory
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<main id="single-strory-template-dfb0a9">
    <section>
        <div class="container">
            <div class="row body-animation">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="left-content">
                        <div class="content">
                            <h1><?= the_title(); ?></h1>
                            <div class="post-dates d-none d-md-flex">
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('author_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_field('author'); ?>
                                </p>
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('location_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_the_terms(get_the_id(), 'country_cat')[0]->name; ?>, <?= get_the_terms(get_the_id(), 'city_cat')[0]->name; ?>
                                </p>
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('species_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_the_terms(get_the_id(), 'species_cat')[0]->name; ?>
                                </p>
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('date_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_the_date('Y-m-d', get_the_id()); ?>
                                </p>
                            </div>
                            <div class="social-networks d-none d-md-flex">
                                <ul>
                                    <?php if(get_field('facebook_link')): ?>
                                        <li>
                                            <a href="<?= get_field('facebook_link')['url']; ?>" target="_blank">
                                                <?= get_field('facebook_label', 'option'); ?>
                                            </a>
                                        </li>
                                    <?php endif; if(get_field('instagram_link')): ?>
                                        <li>
                                            <a href="<?= get_field('instagram_link')['url']; ?>" target="_blank">
                                                <?= get_field('instagram_label', 'option'); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <nav class="post-navigation d-none d-md-flex">
                                <?php if ($prev_post): ?>
                                    <div class="nav-previous">
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                            ←
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($next_post): ?>
                                    <div class="nav-next">
                                        <a href="<?php echo get_permalink($next_post->ID); ?>">
                                            →
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="post-content">
                        <div class="feature-img">
                            <?= the_post_thumbnail(); ?>
                        </div>
                        <div class="description">
                            <?= the_content(); ?>
                        </div>
                    </div>
                    <div class="end-sticky"></div>
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-5 d-block d-md-none">
                    <div class="left-content movil">
                        <div class="content">
                            <div class="post-dates d-flex d-md-none">
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('author_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_field('author'); ?>
                                </p>
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('location_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_the_terms(get_the_id(), 'country_cat')[0]->name; ?>, <?= get_the_terms(get_the_id(), 'city_cat')[0]->name; ?>
                                </p>
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('species_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_the_terms(get_the_id(), 'species_cat')[0]->name; ?>
                                </p>
                                <p class="label-text">
                                    <strong class="label">
                                        <?= get_field('date_label', 'option'); ?>: 
                                    </strong> 
                                    <?= get_the_date('Y-m-d', get_the_id()); ?>
                                </p>
                            </div>
                            <div class="social-networks d-flex d-md-none">
                                <ul>
                                    <?php if(get_field('facebook_link')): ?>
                                        <li>
                                            <a href="<?= get_field('facebook_link')['url']; ?>" target="_blank">
                                                <?= get_field('facebook_label', 'option'); ?>
                                            </a>
                                        </li>
                                    <?php endif; if(get_field('instagram_link')): ?>
                                        <li>
                                            <a href="<?= get_field('instagram_link')['url']; ?>" target="_blank">
                                                <?= get_field('instagram_label', 'option'); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <nav class="post-navigation d-flex d-md-none">
                                <?php if ($prev_post): ?>
                                    <div class="nav-previous">
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                            ←
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($next_post): ?>
                                    <div class="nav-next">
                                        <a href="<?php echo get_permalink($next_post->ID); ?>">
                                            →
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(window).scroll(function() {
        var screen = $(window).width();
        if (screen > 769) {
            var windowScrol = $(window).scrollTop();
            var position = $('.left-content').offset().top;
            var heightContent = $('.end-sticky').offset().top - 400;
            if (windowScrol >= position) {
                $('.left-content .content').addClass('sticky');
            }
            if (windowScrol < position) {
                $('.left-content .content').removeClass('sticky');
                $('.body-animation').removeClass('align-items-end');
            }
            if (windowScrol >= heightContent) {
                $('.left-content .content').removeClass('sticky');
                $('.body-animation').addClass('align-items-end');
            }
        }
    });
</script>         