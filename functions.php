<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Theme Scripts
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function ditto_scripts() {
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/main.bundle.css' );
  wp_enqueue_style( 'bootstrap.css', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style('owl-carousel.css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
  wp_enqueue_style('font-awesome.css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');

  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.bundle.js', array( 'jquery' ), '', true );
  wp_enqueue_script('font-awesome.js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js');
  wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script('owl-carousel.js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
  wp_register_script('custom.js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1', true);
  wp_enqueue_script('custom.js');
}
add_action( 'wp_enqueue_scripts', 'ditto_scripts');

/**
 * Register Navigation Menus
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function ditto_navigation_menus() {
  $locations = array(
    'main_menu' => __( 'Main Menu', 'text_domain' )
  );
  register_nav_menus( $locations );
}
add_action( 'init', 'ditto_navigation_menus' );

/**
 * Theme support
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_theme_support( 'custom-logo' );

/**
 * Login Styles
 */
function ditto_login_styles() { ?>
  <style type="text/css">
    body {
      background-color: #222 !important;
    }
    #login h1 a, .login h1 a {
      display: none;
    }
    #login h1 img {
      width: 100%;
      max-width: 240px;
      max-height: 180px;
    }
  </style>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
      let loginImg = document.createElement("img");
        loginImg.src = "<?= get_template_directory_uri() ?>/images/pipe-code-logo.svg";
        loginImg.alt = "WordPress login image";
        document.querySelector('#login h1').appendChild(loginImg);
    });
  </script>
<?php }
add_action( 'login_enqueue_scripts', 'ditto_login_styles' );

/**
 * Install latest jQuery version 3.5.1
 */
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

/**
 * Disable Gutenberg
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

add_action('init', 'Experiences');

// post type Technologies
function Experiences()
{
  $args = array(
    'public' => true,
    'label'  => 'Experiences',
    'menu_icon' => 'dashicons-buddicons-activity',
    'taxonomies'  => array('category'),
  );
  register_post_type('Experiences', $args);
}
// options pages
if (function_exists('acf_add_options_page')){
	acf_add_options_page(array(
		'page_title'    => 'Theme Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-settings',
		'capability'    => 'edit_posts',
		'redirect'      =>  true
	  ));
  acf_add_options_sub_page(array(
		'page_title'     => 'Footer',
		'menu_title'     => 'Footer',
		'parent_slug'   => 'theme-settings',
	));
  acf_add_options_sub_page(array(
		'page_title'     => 'relatos globals',
		'menu_title'     => 'relatos globals',
		'parent_slug'   => 'theme-settings',
	));
}
// options experiences
if (function_exists('acf_add_options_page')){
	acf_add_options_page(array(
		'page_title'    => 'Option Experiences',
		'menu_title'    => 'Option Experiences',
		'menu_slug'     => 'option-experiences',
		'capability'    => 'edit_posts',
		'redirect'      =>  true
	  ));
    acf_add_options_sub_page(array(
      'page_title'     => 'Experiences',
      'menu_title'     => 'Experiences',
      'parent_slug'   => 'option-experiences',
    ));
}
/*=================== relatos =====================*/
add_theme_support('post-thumbnails');
add_post_type_support( 'relato', 'thumbnail' );
function relatos_post()
{
  /*====== Argument post type =====*/
  $args = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Relato',
    'menu_icon' => 'dashicons-embed-photo',
    'supports' => ['title', 'editor', 'thumbnail'],
  );
  /*============ Register post type ============*/
  register_post_type('relato', $args);
  /*============ Register taxonomy of fqas ============*/
   /*============ Argument taxonimy ============*/
   $labels = array(
    'name' => _x('Country category', 'taxonomy general name'),
    'singular_name' => _x('Country category', 'taxonomy singular name'),
    'search_items' =>  __('Search Country category'),
    'all_items' => __('All Country category'),
    'parent_item' => __('Parent Country category'),
    'parent_item_colon' => __('Parent Country category:'),
    'edit_item' => __('Edit Country category'),
    'update_item' => __('Update Country category'),
    'add_new_item' => __('Add New Country category'),
    'new_item_name' => __('New Country category Name'),
    'menu_name' => __('Country category'),
  );
  /*========== Register taxonomi ==========*/
  register_taxonomy('country_cat', array('relato'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'country_cat'),
  ));
  /*============ City ============*/
  $labels = array(
    'name' => _x('City category', 'taxonomy general name'),
    'singular_name' => _x('City category', 'taxonomy singular name'),
    'search_items' =>  __('Search City category'),
    'all_items' => __('All City category'),
    'parent_item' => __('Parent City category'),
    'parent_item_colon' => __('Parent City category:'),
    'edit_item' => __('Edit City category'),
    'update_item' => __('Update City category'),
    'add_new_item' => __('Add New City category'),
    'new_item_name' => __('New City category Name'),
    'menu_name' => __('City category'),
  );
  /*========== Register taxonomi ==========*/
  register_taxonomy('city_cat', array('relato'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'city_cat'),
  ));
  /*============ City ============*/
  $labels = array(
    'name' => _x('Ecosystem category', 'taxonomy general name'),
    'singular_name' => _x('Ecosystem category', 'taxonomy singular name'),
    'search_items' =>  __('Search Ecosystem category'),
    'all_items' => __('All Ecosystem category'),
    'parent_item' => __('Parent Ecosystem category'),
    'parent_item_colon' => __('Parent Ecosystem category:'),
    'edit_item' => __('Edit Ecosystem category'),
    'update_item' => __('Update Ecosystem category'),
    'add_new_item' => __('Add New Ecosystem category'),
    'new_item_name' => __('New Ecosystem category Name'),
    'menu_name' => __('Ecosystem category'),
  );
  /*========== Register taxonomi ==========*/
  register_taxonomy('ecosystem_cat', array('relato'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'ecosystem_cat'),
  ));
  /*============ Species ============*/
  $labels = array(
    'name' => _x('Species category', 'taxonomy general name'),
    'singular_name' => _x('Species category', 'taxonomy singular name'),
    'search_items' =>  __('Search Species category'),
    'all_items' => __('All Species category'),
    'parent_item' => __('Parent Species category'),
    'parent_item_colon' => __('Parent Species category:'),
    'edit_item' => __('Edit Species category'),
    'update_item' => __('Update Species category'),
    'add_new_item' => __('Add New Species category'),
    'new_item_name' => __('New Species category Name'),
    'menu_name' => __('Species category'),
  );
  /*========== Register taxonomi ==========*/
  register_taxonomy('species_cat', array('relato'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'species_cat'),
  ));
};
add_action('init', 'relatos_post', 3);
/*============== Read more relatos =============*/
add_action('rest_api_init', function () {
  register_rest_route('relatos', '/list', array(
    array(
      'methods'               => WP_REST_Server::READABLE,
      'callback'              => 'relatos_list_handler',
      'permission_callback'   => '__return_true',
    )
  ));
});
/*============ ============*/
function relatos_list_handler($request){
  $params = $request->get_params();
  $totalPosts = wp_count_posts("relato");
  $count = $totalPosts ? $totalPosts->publish : 0;
  $formatedCards = [];
  $query = [
    'post_type'         => 'relato',
    'post_status'       => 'publish',
    'tax_query' => array(
      'relation' => 'AND',
    ),
    'meta_query' => array(),
    'posts_per_page'    => $request['posts_per_page'] ? $request['posts_per_page'] : -1,
    'offset'            => $request['offset'] ? $request['offset'] : 0,
    'order'           => 'ASC',
  ];
  // By country
  if ($request['country']) {
    array_push($query['tax_query'], [
      'taxonomy' => 'country_cat',
      'field' => 'name',
      'terms' =>  $request['country']
    ]);
  }
  // By city
  if ($request['city']) {
    // get by categories
    array_push($query['tax_query'], [
      'taxonomy' => 'city_cat',
      'field' => 'name',
      'terms' =>  $request['city']
    ]);
  }
  // By ecosystem
  if ($request['ecosystem']) {
    array_push($query['tax_query'], [
      'taxonomy' => 'ecosystem_cat',
      'field' => 'name',
      'terms' =>  $request['ecosystem']
    ]);
  }
  // By ecosystem
  if ($request['species']) {
    array_push($query['tax_query'], [
      'taxonomy' => 'species_cat',
      'field' => 'name',
      'terms' =>  $request['species']
    ]);
  }

  $news = new WP_Query($query);
  $relatos = array();
  if($news->have_posts()){
    while ($news->have_posts()) {
      $news->the_post();
      array_push($relatos, array(
        'title' => get_the_title(get_the_id()),
        'thumbnail' => get_the_post_thumbnail_url(get_the_id()),
        'permalink' => get_permalink(get_the_id()),
        'author' => get_field('author', get_the_id()),
        'short_description' => get_field('short_description', get_the_id()),
        'country' => ($terms = get_the_terms(get_the_id(), 'country_cat')) ? $terms[0]->name : '',
        'city' => ($terms = get_the_terms(get_the_id(), 'city_cat')) ? $terms[0]->name : '',
        'ecosystem' => ($terms = get_the_terms(get_the_id(), 'ecosystem_cat')) ? $terms[0]->name : '',
        'species' => ($terms = get_the_terms(get_the_id(), 'species_cat')) ? $terms[0]->name : '',
        'post_date' => get_the_date('Y-m-d', get_the_id()),
      ));
    }
    wp_reset_postdata();
  }
  $total = [];
  if ($relatos) :
    array_push($total, array(
      'have_post' => true,
      'total'     => $count,
      'posts'     => $formatedCards
    ));
  else :
    array_push($total, array(
      'have_post' => false,
      'total'     => 0,
      'posts'     => null,
    ));
  endif;
  $relatos = ['relatos' => $relatos, 'total' => $total];
  return $relatos;
}