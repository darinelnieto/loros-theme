   
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
$reviews = get_field('reviews', 'option');
$posttype = get_post_type();
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
                                        <img src="<?= $img['url']; ?>" alt="<?= $img['title']; ?>" loading="lazy">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?= the_content(); ?>
                        <?php if($pdf): $img_pdf = get_field('image_pdf', 'option'); ?>
                            <a href="<?= $pdf; ?>" download>
                                <img src="<?= $img_pdf['url']; ?>" alt="<?= $img_pdf['title']; ?>" loading="lazy">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="end-sticky"></div>
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="form-contain">
                        <div class="form">
                            <h2>
                                <?php 
                                    if($posttype === 'donate'){
                                        echo get_field('title_form_donate', 'option');
                                    }else{
                                        echo get_field('title_form', 'option'); 
                                    }
                                    
                                ?>
                            </h2>
                            <div class="content-form mt-4">
                                <?= do_shortcode(get_field('shortcode_form', 'option')); ?>
                            </div>
                            <?php if(!empty($reviews)): ?>
                                <div class="reviews">
                                    <?php foreach($reviews as $item): $img = $item['logo']; ?>
                                        <div class="item">
                                            <?php if(!empty($img)): ?>
                                                <img src="<?= $img['url']; ?>" alt="<?= $img['title']; ?>" loading="lazy">
                                            <?php endif; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="224.875" height="37.486" viewBox="0 0 224.875 37.486">
                                                <g id="Grupo_51" data-name="Grupo 51" transform="translate(0 0)">
                                                    <path id="star-1" data-name="Trazado 21" d="M19.707,0,15.055,14.318H0l12.179,8.85L7.527,37.486l12.18-8.85,12.181,8.85L27.235,23.168l12.18-8.85H24.36Z" fill="#fbd349"/>
                                                    <path id="star-2" data-name="Trazado 22" d="M66.028,0,61.376,14.318H46.32l12.18,8.85L53.847,37.486l12.181-8.85,12.18,8.85L73.556,23.168l12.179-8.85H70.68Z" fill="#fbd349"/>
                                                    <path id="star-3" data-name="Trazado 23" d="M112.347,0l-4.652,14.318H92.64l12.179,8.85-4.652,14.318,12.18-8.85,12.181,8.85-4.653-14.318,12.18-8.85H117Z" fill="#fbd349"/>
                                                    <path id="star-4" data-name="Trazado 24" d="M158.667,0l-4.653,14.318H138.959l12.179,8.85-4.652,14.318,12.181-8.85,12.18,8.85L166.2,23.168l12.179-8.85H163.319Z" fill="#fbd349"/>
                                                    <path id="star-5" data-name="Trazado 25" d="M205.167,0l-4.652,14.318H185.46l12.179,8.85-4.652,14.318,12.18-8.85,12.18,8.85-4.652-14.318,12.18-8.85H209.819Z" fill="#fbd349"/>
                                                </g>
                                            </svg>
                                            <p class="qualification"><?= $item['qualification']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
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
    const form = document.querySelector(".wpcf7");
    form.addEventListener(
        "wpcf7submit",
        (e) => {
            url = "https://wa.me/57<?= get_field('whatsapp', 'option'); ?>?text=Quiero%20saber%20más%20sobre%20la%20experiencia%20<?= the_title(); ?>";
            window.open(url, '_blank');
        },
        false
    );
</script>       