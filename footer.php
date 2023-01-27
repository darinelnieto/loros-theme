<?php
/**
 * 
 * Footer template.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$social_networks = get_field('social_networks', 'option');
$email = get_field('email_content', 'option');
?>

<footer id="footer-wrapper">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4">
                <?php 
                    wp_nav_menu([
                        'menu'            => 'Menu 1',
                        'theme_location'  => 'Menu 1',
                        'container'       => 'div',
                        'menu_class'      => 'main-menu-list',
                    ]);
                ?>
            </div>
            <div class="col-12 col-md-4 contact">
                <h2>Síguenos</h2>
                <?php if($social_networks): ?>
                <div class="social-networks">
                    <?php foreach($social_networks as $item): ?>
                        <a href="<?= $item['url']; ?>">
                            <?= $item['icon_fontawesome']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if($email): ?>
                <div class="email-content">
                    <a href="mailto:<?= $email['email']; ?>" target="_blank">
                        <img src="<?= $email['email_icon']; ?>" alt="Icono de email">
                        <span><?= $email['email']; ?></span>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-2">
                <img src="<?= esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" alt="Logo de la fundación" class="logo-footer">
            </div>
        </div>
    </div>
</footer>

</div> <!-- -Page container -->

<?php wp_footer(); ?>
</body>
</html>