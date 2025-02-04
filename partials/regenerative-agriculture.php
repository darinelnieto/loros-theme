   
<?php
/**
 * 
 * Partial Name: aegenerative-agriculture
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$page = is_front_page();
$image = get_field('image_regenerative_agriculture');
$learn_more = get_field('learn_more_regenerative_agriculture');
?>
<section class="aegenerative-agriculture-partial-e2499b">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-7 d-none d-md-block content-image">
                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
            </div>
            <div class="col-12 col-md-5">
                <h2><?= get_field('title_regenerative_agriculture'); ?></h2>
                <p <?php if($page): ?>class="in-home"<?php endif; ?>><?= get_field('description_regenerative_agriculture'); ?></p>
                <a href="<?= $learn_more; ?>"><?php if(get_bloginfo("language") == "en-US"): echo "LEARN MORE"; else: echo "VER MÁS"; endif; ?></a>
            </div>
            <div class="col-12 d-block d-md-none mt-5 content-image">
                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
            </div>
        </div>
    </div>
</section>
                    