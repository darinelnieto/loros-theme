   
<?php
/**
 * 
 * Partial Name: banner-home
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$gallery = get_field('gallery_slide');
?>
<section class="banner-home-partial-e4327c">
    <?php if($gallery): ?>
    <div class="owl-carousel banner-home">
        <?php foreach($gallery as $image): ?>
            <div class="imgae">
                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
                    