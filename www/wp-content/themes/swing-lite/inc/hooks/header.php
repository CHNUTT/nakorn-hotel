<?php
/**
 * Header Section Function Area
*/

/**
 * Skip links
 * @since  1.0.0
 * @return void
*/
if ( ! function_exists( 'swing_lite_skip_links' ) ) {
	function swing_lite_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'swing-lite' ); ?></a>
		<?php
	}
}
add_action( 'swing_lite_header_before', 'swing_lite_skip_links', 5 );


/**
 * Top Header Function Area
**/
if ( ! function_exists( 'swing_lite_top_header' ) ) {
	function swing_lite_top_header() {
		$swing_lite_header_layouts_type = get_theme_mod( 'swing_lite_header_layouts_setting', 'layout1' );
		get_template_part( 'template-parts/header', esc_attr($swing_lite_header_layouts_type) );
	}

}
add_action( 'swing_lite_main_header', 'swing_lite_top_header', 15 );