   
<?php
/**
 * 
 * Partial Name: associates
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$associates = get_field('logo_associates');
if($associates):
?>
<section class="associates-partial-e72c3e">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <h2><?= get_field('title_associates'); ?></h2>
                <div class="content-logos">
                    <?php foreach($associates as $img): ?>
                        <img src="<?= $img['url']; ?>" alt="<?= $img['title']; ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>              