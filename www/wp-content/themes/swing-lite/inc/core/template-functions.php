<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package swing
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function swing_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if(class_exists('WooCommerce')) {
		if( is_woocommerce() ){
	       $classes[] = 'columns-3';
	   }
	}

	if( is_page_template('page-template-template-home') || is_home() ) {
		$classes[] = 'no-breadcrumb';
	}
	
	if( is_page() ) {
		global $post;
		$swing_lite_page_layout = get_post_meta( $post->ID, 'swing_lite_page_layout', true );
		$swing_lite_page_layout = ($swing_lite_page_layout) ? $swing_lite_page_layout : 'no-sidebar';
		$classes[] = esc_attr($swing_lite_page_layout);

	} elseif( is_singular( 'hb_room' ) || is_archive( 'hb_room' ) || is_single() ) {
		$classes[] = 'right-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'swing_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function swing_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'swing_lite_pingback_header' );