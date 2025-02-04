   
<?php
/**
 * 
 * Partial Name: banner-generic
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$gallery = get_field('gallery_image');
?>
<section class="banner-generic-partial-13237e">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($gallery): ?>
                    <div class="owl-carousel generic-banner">
                        <?php foreach($gallery as $image): ?>
                            <div class="image">
                                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    