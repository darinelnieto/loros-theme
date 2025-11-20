<?php
/**
 * 
 * Default page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$banner = get_field('banner_image');
$text = get_field('text_after_title');
?>
<main id="ditto-page">
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
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?= the_content(); ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>