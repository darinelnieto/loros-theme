   
<?php
/**
 * 
 * Template Name: how-to-get
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$arrival_type = get_field('arrival_type');
$from = get_field('from');
?>
<main id="how-to-get-template-f3897a">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 content-image">
                    <a href="<?= get_field('url_google_maps_or_waze'); ?>" target="_blank">
                        <img src="<?= get_field('map'); ?>" alt="Imagen del mapa">
                    </a>
                </div>
                <?php if($arrival_type): ?>
                    <div class="col-12 col-md-4 types">
                        <?php foreach($arrival_type as $type): ?>
                            <p style="color:<?= $type['color']; ?>;"><span style="background:<?= $type['color']; ?>;"></span> <?= $type['text']; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if($from): ?>
                    <div class="col-12 col-md-5 from">
                        <?php foreach($from as $item): ?>
                            <p><?= $item['description']; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="col-12 col-md-3">
                    <a href="<?= get_field('contac'); ?>" target="_blank">
                        <div class="contact">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>CONTÁCTANOS</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
                    