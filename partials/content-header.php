   
<?php
/**
 * 
 * Partial Name: content-header
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="content-header-partial-60affd">
    <div class="container">
      <div class="row">
        <div class="col-6 col-md-2">
          <?= get_custom_logo(); ?>
        </div>
        <div class="col-6 col-md-10">
            <div class="bar-menu">
                <span class="top"></span>
                <span class="center"></span>
                <span class="bottom"></span>
            </div>
            <div class="menu-movil">
              <?php 
                  wp_nav_menu([
                      'menu'            => 'Menu 1',
                      'theme_location'  => 'Menu 1',
                      'menu_class'      => 'main-menu-list',
                  ]);
              ?>
            </div>
        </div>
      </div>
    </div>
</div>
                    