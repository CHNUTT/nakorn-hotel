<?php
/**
 * Template Name: Blog-Page
 * The template for displaying blog pages
 *
 * @package hotel-wp-lite
 * @since 1.0

 */

get_header();

//get settings
global $hotel_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}

?>
<div class="container background">

    <div class="row">
		<?php if($hotel_wp_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft" > 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<div id="primary" class="col-md-8 col-sm-8 content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
		?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				if ( is_archive() ) {
				    
					get_template_part( 'template-parts/post/content', 'excerpt' );
					
				} else {
					
					get_template_part( 'template-parts/post/content', get_post_format() );
					
				}
			endwhile;

			the_posts_pagination(
				array(
				'mid_size' => 0,
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'hotel-wp-lite' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'hotel-wp-lite' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'View', 'hotel-wp-lite' ).'</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'hotel-wp-lite' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'hotel-wp-lite' ) . '</span> <span class="nav-title">'.__( 'View', 'hotel-wp-lite' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					
				)
			);

		else :		
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($hotel_wp_option['blog_sidebar_position']=='right'): ?>
		<div class="col-md-4 col-sm-4 floateright" > 
		<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	</div>
</div><!-- .container -->

<?php
get_footer();