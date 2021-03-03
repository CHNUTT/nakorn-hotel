<?php
/**
 * Template for displaying search forms in hotel-wp-lite
 *
 * @package hotel-wp-lite
 * @since 1.0

 */

?>

<?php $hotel_wp_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($hotel_wp_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'hotel-wp-lite' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr($hotel_wp_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'hotel-wp-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo hotel_wp_get_fo( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'hotel-wp-lite' ); ?></span></button>
</form>
