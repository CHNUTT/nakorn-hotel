<?php
/**
 * Footer Section Function Area
*/

/**
 * Footer Before Function Area
**/



if ( ! function_exists( 'swing_lite_footer_before_cb' ) ) { 

	function swing_lite_footer_before_cb() { 
		$background_image = get_theme_mod('swing_lite_footer_background_image', '');
		?>
			<footer id="swing-footer" class="site-footer footer-wrapper">
				<?php if($background_image) { ?>
					<div class="overlay"></div>
				<?php } ?>
				<div class="s-container clear">
		<?php
	}
}
add_action( 'swing_lite_footer_before', 'swing_lite_footer_before_cb', 10 );


/**
 * Footer Widget area function area
**/
if ( ! function_exists( 'swing_lite_footer_contents_cb' ) ) {
	function swing_lite_footer_contents_cb() {

		$footer_top_text = get_theme_mod('swing_lite_footer_top_text', '' );
		$footer_bottom_text = get_theme_mod('swing_lite_footer_bottom_text', '');
		?>
		<div class="footer-container">

			<div class="footer-content footer-text">
				<?php
					if( $footer_top_text ) {
						echo wp_kses_post($footer_top_text);
					} else {
						?>
						&copy; <?php printf( '%1$s %2$s', esc_html( date('Y') ), esc_html( get_bloginfo('name') ) ); ?>
						<?php
					}
				?>
				<?php printf( wp_kses( ' | WordPress Theme: <a href="%s">Swing Lite</a>', array( 'a' => array( 'href' => array() ) ) ), esc_url( 'http://accesspressthemes.com/wordpress-themes/swing-lite' ) ); ?>
			</div>

			<div class="footer-content">
				<?php echo do_shortcode($footer_bottom_text); ?>
			</div>

		</div>

	<?php 
       }  
		
}
add_action( 'swing_lite_footer_contents', 'swing_lite_footer_contents_cb', 20 );


/**
 * Footer After Function Area
**/
if ( ! function_exists( 'swing_lite_footer_after_cb' ) ) { 
	
	function swing_lite_footer_after_cb() { ?>
			</div> <!-- end of the ak-container -->
		</footer><!-- #colophon -->
		<?php
	}
}
add_action( 'swing_lite_footer_after', 'swing_lite_footer_after_cb', 40 );