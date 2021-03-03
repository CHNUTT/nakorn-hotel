<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotel-wp-lite
 * @since 1.0

 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'hotel-wp-lite' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
