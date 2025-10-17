   
<?php
/**
 * 
 * Partial Name: forest-nursery
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$page = is_front_page();
?>
<section class="forest-nursery-partial-9192c8">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 content-texts">
                <h2><?= get_field('title_forest_nursery'); ?></h2>
                <p <?php if($page): ?>class="in-home"<?php endif; ?>><?= get_field('description_forest_nursery'); ?></p>
                <a href="<?= get_field('link_forest_nursery'); ?>"><?php if(get_bloginfo("language") == "en-US"): echo "LEARN MORE"; else: echo "VER MÁS"; endif; ?></a>
            </div>
            <div class="col-12 col-md-6 content-image">
                <?php $img = get_field('image_forest_nursery'); if(!empty($img)): ?>
                    <img src="<?= $img['url']; ?>" alt="<?= $img['title']; ?>" loading="lazy">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                    