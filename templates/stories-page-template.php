   
<?php
/**
 * 
 * Template Name: stories-page
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$banner = get_field('banner_image');
$text = get_field('text_after_title');
?>
<main id="relatos-page-template-686681">
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
    <section class="relatos">
        <div class="container">
            <div class="row" id="relatos-list"></div>
            <div class="row">
                <div class="col-12 text-center">
                    <span onclick="read_more();" class="read-more">Cargar más</span>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="<?= get_template_directory_uri() ?>/js/stories.js"></script>
<script>
    const rout = _dittoURL_ + "/wp-json/relatos/list";
    const author_label = '<?= get_field('author_label', 'option'); ?>';
    const location_label = '<?= get_field('location_label', 'option'); ?>';
    const species_label = '<?= get_field('species_label', 'option'); ?>';
    const cta_text = '<?= get_field('cta_text', 'option'); ?>';
    const date_label = '<?= get_field('date_label', 'option'); ?>';
</script>
<?php get_footer(); ?>