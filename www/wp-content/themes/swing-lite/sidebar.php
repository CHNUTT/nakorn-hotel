<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swing
 */

$swing_lite_sidebar = 'swing-lite-sidebar';

if( class_exists( 'Woocommerce' ) ) {
	if( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
		$swing_lite_sidebar = 'swing-lite-woo-sidebar';
	}
}

if ( ! is_active_sidebar( $swing_lite_sidebar ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( $swing_lite_sidebar ); ?>
</aside><!-- #secondary -->