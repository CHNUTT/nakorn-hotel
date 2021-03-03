<?php
/**
 * Template Name:Contact-Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotel-wp-lite
 * @since 1.0

 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();
            ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php
							the_content();
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

            <?php
			endwhile; // End of the loop.
			?>
			</div><!-- .container -->
			<?php
			//get options
			global $hotel_wp_option;	 
			if ( class_exists( 'WP_Customize_Control' ) ) {
			   $hotel_wp_default_settings = new hotel_wp_settings();
			   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
			} 
			//get featured areas
			if(($hotel_wp_option['contact_featured_area_1'])!='none'){
				hotel_wp_featured_area($hotel_wp_option['contact_featured_area_1']);
			} 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->
<?php
get_footer();

