<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles', PHP_INT_MAX );

function enqueue_parent_styles() {



   // /* CSS Child */
    wp_register_style('template-child', get_stylesheet_directory_uri() . '/assets/css/template.css', $depedencies, wp_get_theme()->get('Version'));
    wp_enqueue_style( 'template-child', get_stylesheet_directory_uri() . '/assets/css/template.css');
    $depedencies[] = 'template-child';
   
    wp_register_style('module-child', get_stylesheet_directory_uri() . '/assets/css/module.css', $depedencies, wp_get_theme()->get('Version'));
    wp_enqueue_style( 'module-child', get_stylesheet_directory_uri() . '/assets/css/module.css');
    $depedencies[] = 'module-child';

    wp_register_style('general-style-child', get_stylesheet_directory_uri() . '/assets/css/general-style.css', $depedencies, wp_get_theme()->get('Version'));
    wp_enqueue_style( 'general-style-child', get_stylesheet_directory_uri() . '/assets/css/general-style.css');
    $depedencies[] = 'general-style-child';

    wp_register_style('style2-child', get_stylesheet_directory_uri() . '/assets/css/style2.css', $depedencies, wp_get_theme()->get('Version'));
    wp_enqueue_style( 'style2-child', get_stylesheet_directory_uri() . '/assets/css/style2.css');
    $depedencies[] = 'style2-child';
   
     wp_register_style('style-child', get_stylesheet_directory_uri() . '/assets/css/style.css', $depedencies, wp_get_theme()->get('Version'));
    wp_enqueue_style( 'style-child', get_stylesheet_directory_uri() . '/assets/css/style.css');
    $depedencies[] = 'style-child';

    wp_register_style('responsive-child', get_stylesheet_directory_uri() . '/assets/css/responsive.css', $depedencies, wp_get_theme()->get('Version'));
    wp_enqueue_style( 'responsive-child', get_stylesheet_directory_uri() . '/assets/css/responsive.css');
    $depedencies[] = 'responsive-child';

   
      wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',
        array( $depedencies ),
        wp_get_theme()->get('Version')
    );
 
 
  
}

add_action('template_redirect', 'my_custom_disable_author_page');

function my_custom_disable_author_page() {
    global $wp_query;

    if ( is_author() ) {
        $wp_query->set_404();
        status_header(404);
        // Redirect to homepage
        // wp_redirect(get_option('home'));
    }
}

/* Disable Author Pages (Archives) */
function sertmedia_disable_author_archives() { 
  if (is_author()) { global $wp_query; $wp_query->set_404(); status_header(404); } 
  else { redirect_canonical(); } } remove_filter('template_redirect', 'redirect_canonical'); add_action('template_redirect', 'sertmedia_disable_author_archives'); 


?>