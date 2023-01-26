   
<?php
/**
 * 
 * Template Name: experiences
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
get_header();
$pdf = get_field('pdf_download');
?>
<main id="experiences-template-ff0b59">
    <!-- Generic banner -->
    <?php get_template_part('partials/banner-generic'); ?>
    <!-- Experience content -->
    <section class="experience">
        <div class="content-text">
            <h1><?= get_field('title_experience'); ?></h1>
            <?= the_content(); ?>
            <?php if($pdf): ?>
                <a href="<?= $pdf; ?>" download>
                    <img src="<?= get_field('image_pdf', 'option'); ?>" alt="Imagen cta descarga pdf">
                </a>
            <?php endif; ?>
        </div>
        <div class="form">
            <h2><?= get_field('title_form', 'option'); ?></h2>
            <div class="content-form mt-4">
                <?= do_shortcode(get_field('shortcode_form', 'option')); ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function(){
        $('.Experince').val('<?= the_title(); ?>');
        $('.submit button').attr("disabled", true).css({'opacity':1});
    });
    // validate politic
    $('.politic').on('click', function(){
        if($('input[type="checkbox"]').prop('checked')){
            $('.submit button').attr("disabled", false);
            $('.anima-check').addClass('active');
        }else{
            $('.submit button').attr("disabled", true);
            $('.anima-check').removeClass('active');
        }
    });
    // submit
    const form = document.querySelector("#wpcf7-f122-o1");
    form.addEventListener(
        "wpcf7submit",
        (e) => {
            window.location.href = "https://wa.me/57<?= get_field('whatsapp', 'option'); ?>?text=Quiero%20saber%20más%20sobre%20la%20experiencia%20<?= the_title(); ?>";
        },
        false
    );
</script>       