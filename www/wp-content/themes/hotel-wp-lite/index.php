<?php
/**
 * The main template file
 *
 * The most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotel-wp-lite
 * @since 1.0
 */

get_header(); 
global $hotel_wp_option;
?>

<div class="container background" >
    <div class="row">
		<?php if($hotel_wp_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft" > 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>

	<div id="primary" class="col-sm-8 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				the_posts_pagination(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'hotel-wp-lite' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'hotel-wp-lite' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'Previous page', 'hotel-wp-lite' ).'</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'hotel-wp-lite' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'hotel-wp-lite' ) . '</span> <span class="nav-title">'.__( 'Next page', 'hotel-wp-lite' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'hotel-wp-lite' ) . ' </span>',
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
