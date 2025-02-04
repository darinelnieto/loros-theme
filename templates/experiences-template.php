   
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
$gallery = get_field('gallery_image');
?>
<main id="experiences-template-ff0b59">
    <!-- Experience content -->
    <section class="experience">
        <div class="container">
            <div class="row body-animation">
                <div class="col-12 col-md-7 col-lg-8 mb-5 mb-md-0">
                    <div class="content-text">
                        <h1><?= the_title(); ?></h1>
                        <?php if($gallery): ?>
                            <div class="gallery owl-carousel">
                                <?php foreach($gallery as $img): ?>
                                    <div class="item">
                                        <img src="<?= $img['url']; ?>" alt="<?= $img['title']; ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?= the_content(); ?>
                        <?php if($pdf): ?>
                            <a href="<?= $pdf; ?>" download>
                                <img src="<?= get_field('image_pdf', 'option'); ?>" alt="Imagen cta descarga pdf">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="end-sticky"></div>
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="form-contain">
                        <div class="form">
                            <h2><?= get_field('title_form', 'option'); ?></h2>
                            <div class="content-form mt-4">
                                <?= do_shortcode(get_field('shortcode_form', 'option')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    //event scroll sticky
    $(window).scroll(function() {
        var screen = $(window).width();
        if (screen > 769) {
            var windowScrol = $(window).scrollTop();
            var position = $('.form-contain').offset().top;
            var heightContent = $('.end-sticky').offset().top - 570;
            if (windowScrol >= position) {
                $('.form').addClass('sticky');
            }
            if (windowScrol >= heightContent) {
                $('.form').removeClass('sticky');
                $('.body-animation').addClass('align-items-end');
            }
            if (windowScrol < position) {
                $('.form').removeClass('sticky');
                $('.body-animation').removeClass('align-items-end');
            }
        }
    });
    $('.gallery').owlCarousel({
        autoplay:true,
        loop:true,
        nav:false,
        dots:true,
        margin:10,
        items:1
    }).css({'opacity':1});
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
            url = "https://wa.me/57<?= get_field('whatsapp', 'option'); ?>?text=Quiero%20saber%20más%20sobre%20la%20experiencia%20<?= the_title(); ?>";
            window.open(url, '_blank');
        },
        false
    );
</script>       