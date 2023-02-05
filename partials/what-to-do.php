   
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
                <p>
                    <?php
                        if($page){
                           echo get_field('description_what_to_do'); 
                        }else{
                            echo the_content();
                        }
                    ?>
                </p>
                <?php if($page): ?>
                    <a href="<?= $learn_more; ?>">CONOCE MÁS</a>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6 content-loro">
                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
            </div>
        </div>
    </div>
</section>
                    