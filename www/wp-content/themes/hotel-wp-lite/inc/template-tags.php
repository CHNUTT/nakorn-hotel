<?php
/**
 * Custom template tags for this theme
 * @package hotel-wp-lite
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 
if ( ! function_exists( 'hotel_wp_featured_areas' ) ) : 
/**
 * hotel-wp-lite featured areas
 */
 
function hotel_wp_featured_areas(){
return  array(
	    'slider'=>__('Home Slider', 'hotel-wp-lite'),
		'booking'=>__('Booking Search', 'hotel-wp-lite'),
		'hero'=>__('Hero Section', 'hotel-wp-lite'),
		'room'=>__('Room Section', 'hotel-wp-lite'),		
		'service'=>__('Service', 'hotel-wp-lite'),
		'contact'=>__('Contact', 'hotel-wp-lite'),
		'logo'=>__('Features Callout', 'hotel-wp-lite'),
		'none'=>__('None', 'hotel-wp-lite')
		);
}

endif;

if ( ! function_exists( 'hotel_wp_color_codes' ) ) : 
/**
 * hotel-wp-lite color codes
 */
 
function hotel_wp_color_codes(){
	return array('#000000','#ffffff','#ED0A70','#e7ad24','#FFD700','#81d742','#0053f9','#8224e3');
}

endif;

if ( ! function_exists( 'hotel_wp_background_style' ) ) : 
/**
 * hotel-wp-lite color codes
 */
 
function hotel_wp_background_style(){
	return array(
					'no-repeat'  => __('No Repeat', 'hotel-wp-lite'),
					'repeat'     => __('Tile', 'hotel-wp-lite'),
					'repeat-x'   => __('Tile Horizontally', 'hotel-wp-lite'),
					'repeat-y'   => __('Tile Vertically', 'hotel-wp-lite'),
				);
}

endif;

/**
 * @package twentyseventeen
 * @sub-package hotel-wp-lite
 * @since 1.0
 */ 
if ( ! function_exists( 'hotel_wp_posted_on' ) ) : 
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function hotel_wp_posted_on() {
		
		$byline = sprintf(
			// Get the author name; wrap it in a link.
			esc_html_x( 'By %s', 'post author', 'hotel-wp-lite' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);		

		// Finally, let's write all of this to the page.
		echo '<span class="posted-on">' . hotel_wp_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package hotel-wp-lite
 * @since 1.0
 */ 
if ( ! function_exists( 'hotel_wp_time_link' ) ) :
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function hotel_wp_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);

		$args = array( 'time'=> array('class'=> array(),'datetime'=>array()));
		
		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__( '<span class="screen-reader-text">%1$s</span> %2$s', 'hotel-wp-lite'),
			esc_html__('Posted on', 'hotel-wp-lite'),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' .wp_kses($time_string, $args). '</a>'
		);
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package hotel-wp-lite
 * @since 1.0
 */ 
if ( ! function_exists( 'hotel_wp_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function hotel_wp_entry_footer() {

	
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'hotel-wp-lite') );
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'hotel-wp-lite') );
				
		// We don't want to output .entry-footer if it will be empty, so make sure its not.
		if ( ( ( hotel_wp_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

			echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				
				if ( ( $categories_list && hotel_wp_categorized_blog() ) || $tags_list ) {
					echo '<span class="cat-tags-links">';

					// Make sure there's more than one category before displaying.
					if ( $categories_list && hotel_wp_categorized_blog() ) {
						
						echo '<span class="cat-links">' . hotel_wp_get_fo( array( 'icon' => 'folder-open' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Categories', 'hotel-wp-lite') . '</span>' .$categories_list. '</span>';
					}
					
					if ( $tags_list && ! is_wp_error( $tags_list ) ) {
					
						echo '<span class="tags-links">' . hotel_wp_get_fo( array( 'icon' => 'hashtag' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Tags', 'hotel-wp-lite') . '</span>' .$tags_list. '</span>';
					}

					echo '</span>';
				}
			}


			hotel_wp_edit_link();

			echo '</footer> <!-- .entry-footer -->';
		}
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package hotel-wp-lite
 * @since 1.0
 */ 
if ( ! function_exists( 'hotel_wp_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 * Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function hotel_wp_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'hotel-wp-lite' ),
				esc_html(get_the_title())
			),
			' <span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package hotel-wp-lite
 * @since 1.0
 * Returns true if a blog has more than 1 category.
 * @return bool
 */
function hotel_wp_categorized_blog() {
	$category_count = get_transient( 'hotel_wp_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'hotel_wp_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}


/**
 * Add Cart icon and count to header if WC is active
 */
function hotel_wp_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	global $woocommerce; 
	?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Cart View', 'hotel-wp-lite'); ?>">
	<span class="cart-contents-count fa fa-shopping-basket">&nbsp;(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)</span>
    </a> 
    <?php
	
	} 
 
}
add_action( 'woocommerce_cart_top', 'hotel_wp_wc_cart_count' );

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function hotel_wp_add_to_cart_fragment( $fragments ) {

	if(!class_exists('woocommerce')) return;

	global $woocommerce;
	ob_start();
	?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Cart View', 'hotel-wp-lite'); ?>">
    <span class="cart-contents-count fa fa-shopping-basket">&nbsp;(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)&nbsp;</span>
    </a> 
    <?php
	$cart_fragments['a.cart-contents'] = ob_get_clean();
	return $cart_fragments;
	
}
add_filter( 'woocommerce_add_to_cart_fragments', 'hotel_wp_add_to_cart_fragment' );

/**
 * @package twentyseventeen
 * @sub-package hotel-wp-lite
 * @since 1.0
 * Flush out the transients used in hotel_wp_categorized_blog.
 */
function hotel_wp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'hotel_wp_categories' );
}
add_action( 'edit_category', 'hotel_wp_category_transient_flusher' );
add_action( 'save_post', 'hotel_wp_category_transient_flusher' );


function hotel_wp_font_family(){

	$google_fonts = array("Open Sans" => "Open Sans",
						  "PT Sans" => "PT Sans",
						  "Times New Roman, Sans Serif" => "Times New Roman, Sans Serif");
	return $google_fonts;
}

function hotel_wp_footer_foreground_css(){

	$color =  esc_attr(get_theme_mod( 'footer_foreground_color','#fff')) ;
	$theme_color = '#eda81b';
	
	if ( 'default' == get_theme_mod( 'colorscheme','default' )) {
    	$theme_color = esc_attr(get_theme_mod( 'colorscheme_color','#eda81b')) ;
	}
	
	/**
	 *
	 * @since hotel-wp-lite 1.0
	 *
	 */

$css                = '

.footer-foreground {}
.footer-foreground .widget-title, 
.footer-foreground a, 
.footer-foreground p, 
.footer-foreground li,
.footer-foreground table
{
  color:'.$color.';
}

.footer-foreground a:hover, .footer-foreground a:active {color:'.$theme_color.';}

';

return $css;

}


