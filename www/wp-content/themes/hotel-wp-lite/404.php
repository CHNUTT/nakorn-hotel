<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package hotel-wp-lite
 * @since 1.0

 */

get_header(); ?>

<div class="container background">
	<div id="primary" class="content-area ">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found text-center">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hotel-wp-lite' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
				
				<div class="text-center">
				<i class="fa fa-exclamation-circle page-not-found"></i>
				<span class="page-not-found-text"><?php esc_html_e('404','hotel-wp-lite'); ?></span>
				<h2><?php esc_html_e( 'Search again?', 'hotel-wp-lite' ); ?></h2>
					<div align="center" class='form-404'>
					<?php get_search_form(); ?>
					</div>
				</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php
get_footer();

