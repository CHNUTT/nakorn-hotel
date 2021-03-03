<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotel-wp-lite
 * @since 1.0

 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
	<header class="entry-header">
	
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
		
			if ( is_sticky() && is_home() ) :
				echo hotel_wp_get_fo( array( 'icon' => 'thumb-tack' ) );
			endif;
			
			if ( is_single() ) {
				hotel_wp_posted_on();
			} else {
				echo hotel_wp_time_link();
				hotel_wp_edit_link();
			};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->	
	
		<?php if( has_post_thumbnail() ): ?>
		<div class="post-thumbnail" >
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>		

	<div class="entry-container">

	
	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hotel-wp-lite' ),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'hotel-wp-lite' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->
	</div>

	<?php
	if ( is_single() ) {
		hotel_wp_entry_footer();
	}
	?>

</article><!-- #post-## -->
