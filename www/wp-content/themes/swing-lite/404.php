<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package swing
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">

				<div class="page-content">
					<div class="s-container">
						<h1 class="page-title">
							<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'swing-lite' ); ?>
						</h1>

						<p>
							<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'swing-lite' ); ?>		
						</p>
						<?php
							get_search_form();
						?>
				    </div>
				</div><!-- .page-content -->
				
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();