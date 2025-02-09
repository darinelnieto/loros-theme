   
<?php
/**
 * 
 * Partial Name: what-to-do
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$page = is_front_page();
$image = get_field('image_what_to_do');
$learn_more = get_field('link_what_to_do');
?>
<section class="what-to-do-partial-af91aa <?php if($page): ?>mb-3 mt-3<?php endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 content-texts">
                <h2><?= get_field('title_what_to_do'); ?></h2>
                <?php if($page): ?>
                    <p class="in-home"><?= get_field('description_what_to_do'); ?></p>
                <?php else: ?>
                    <div class="content-description">
                        <?= the_content(); ?>
                    </div>
                <?php endif; ?>
                <?php if($page): ?>
                    <a href="<?= $learn_more; ?>"><?php if(get_bloginfo("language") == "en-US"): echo "LEARN MORE"; else: echo "VER MÁS"; endif; ?></a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6 content-loro">
                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" <?php if($page): ?>class="image-home"<?php endif; ?>>
            </div>
        </div>
    </div>
</section>