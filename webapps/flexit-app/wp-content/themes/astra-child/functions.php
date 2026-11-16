<?php
/**
 * Cinnamon Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cinnamon
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_CINNAMON_VERSION', '1.0.13' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	// Refresh cached CSS after child-theme updates, including desktop menu sizing.
	wp_enqueue_style(
		'cinnamon-theme-css',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'astra-theme-css' ),
		filemtime( get_stylesheet_directory() . '/style.css' ),
		'all'
	);
   wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', null, '1.8.1', 'all' );
   wp_enqueue_style( 'slick-theme-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', null, '1.8.1', 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function child_enqueue_scripts() {
   
   wp_register_script( 'slick-carousel', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );
   wp_enqueue_script( 'slick-carousel' );
   //wp_enqueue_script( 'cinnamon-theme-js', get_stylesheet_directory_uri().'/assets/js/cinnamon.js', array( 'jquery' ), CHILD_THEME_CINNAMON_VERSION, true );
   
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_scripts', 15 );

function my_deregister_styles() {
    if(!is_user_logged_in()) {  
        wp_deregister_style( 'dashicons' );
    }
}
add_action( 'wp_enqueue_scripts', 'my_deregister_styles', 100 );

wp_register_script(
   'slick-loop-js',
   false, // No external file
   array('slick-carousel'), // No dependencies
   '1.0.6',
   true // Load in footer
);
wp_enqueue_script('slick-loop-js');

// Add inline JavaScript
$js = '
( function($) {
   
   if ( !$("html.fl-builder-edit").length ) {
      $(".destination-slider ul").slick({
         slide: "li",
         arrows: false,
         dots: false,
         autoplay: true,
         slidesToShow: 5,
         infinite: true,
         responsive: [
            {
              breakpoint: 1200,
              settings: {
               slidesToShow: 3,
               slidesToScroll: 1,
              }
            },
            {
              breakpoint: 992,
              settings: {
               slidesToShow: 2,
               slidesToScroll: 1
              }
            },
            {
              breakpoint: 768,
              settings: {
               slidesToShow: 2,
               slidesToScroll: 1,
               adaptiveHeight: true,
               dots: false,
               arrows: false
              }
            }
           ]
      });

   }
   
})(jQuery)
      ';
wp_add_inline_script('slick-loop-js', $js);

add_filter( 'upload_mimes', function( $upload_mimes ) {
   if ( ! current_user_can( 'administrator' ) ) {
       return $upload_mimes;
   }
   
   $upload_mimes['svg'] = 'image/svg+xml';
   $upload_mimes['woff'] = 'font/woff';
   $upload_mimes['woff2'] = 'font/woff2';
   
   return  $upload_mimes;
   
});

function prfx_bb_add_svg_support($regex) {
    $regex = array(
            'photo' => '#(jpe?g|png|gif|svg|webp)#i',
        );
    return $regex;
}
add_filter( 'fl_module_upload_regex', 'prfx_bb_add_svg_support');

function WebP_upload_mimes( $existing_mimes ) {// add WebP to the list of mime types
    $existing_mimes['WebP'] = 'image/WebP';// return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter( 'mime_types', 'WebP_upload_mimes' );

/**
 * The archive embeds a saved Box. The facet add-on scans top-level layout
 * nodes, so point its Loop provider at the saved Box that owns the query.
 */
function flexit_connect_insights_loop( $module ) {
	if ( ! is_home() || 'uz9v3b76tk1f' !== $module->node || ! empty( $module->settings->wpgb ) ) {
		return;
	}

	$module->settings->wpgb = array( 'post_id' => 1623 ); // Published Post Loop Section template.
	add_filter( 'wp_grid_builder_beaver_builder/handle_module', 'flexit_handle_insights_loop', 20, 2 );
}
add_action( 'fl_builder_before_render_module', 'flexit_connect_insights_loop', 5 );

function flexit_handle_insights_loop( $handle, $grid ) {
	return 'bb-module-uz9v3b76tk1f' === $grid || $handle;
}

/** Render the category name inside the builder's existing “Showing” text. */
function flexit_insights_category_display() {
	$script = '/assets/js/insights-category.js';
	wp_enqueue_script( 'flexit-insights-category', get_stylesheet_directory_uri() . $script, array(), filemtime( get_stylesheet_directory() . $script ), true );
	return '<span data-insights-category aria-live="polite">' . esc_html__( 'All', 'astra-child' ) . '</span>';
}
add_shortcode( 'news-insights-active-category-display', 'flexit_insights_category_display' );
