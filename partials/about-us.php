   
<?php
/**
 * 
 * Partial Name: about-us
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$page = is_front_page();
?>
<section class="about-us-partial-ead2f7">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-5 mb-md-0 content-texts">
                <h1><?= get_field('title_about'); ?></h1>
                <?php if($page): ?>
                    <p class="in-home"><?= get_field('about_description'); ?></p>
                <?php else: ?>
                    <div class="content-description">
                        <?= the_content(); ?>
                    </div>
                    <div class="read-more">
                        <span class="more">Leer mas</span>
                        <span class="less d-none">Leer menos</span>
                    </div>
                <?php endif; ?>
                <?php if($page): ?>
                    <a href="<?= get_field('learn_more'); ?>">CONOCE MÁS</a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6 content-loro">
                <img src="<?= get_field('image_about_us')['url']; ?>" alt="<?= get_field('image_about_us')['title']; ?>">
            </div>
        </div>
    </div>
</section>
                    