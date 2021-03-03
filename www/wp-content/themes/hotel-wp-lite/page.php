<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotel-wp-lite
 * @since 1.0

 */
//get default options
global $hotel_wp_option;
get_header(); 
?>

<div class="container background">
   <div class="row">
	<?php if($hotel_wp_option['layout_section_post_one_column']==false): ?>
		<?php if($hotel_wp_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft"> 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>    
	<div id="primary" class="col-md-8 col-sm-8 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main --> 

	</div><!-- #primary -->
	<?php if($hotel_wp_option['blog_sidebar_position']=='right'): ?>
		<?php if($hotel_wp_option['layout_section_post_one_column']==false): ?>
			<div class="col-md-4 col-sm-4" > 
			<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>	
  </div>		
</div><!-- .container -->

<?php
get_footer();
