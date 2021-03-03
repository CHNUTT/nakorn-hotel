<?php
/**
 * Template Name: Room Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package swing
 */
global $hb_settings, $post;

get_header();?>

<div class="s-container">
	<div class="content-area room-page-lists">
		<main id="main" class="site-main">

			<div class="room-listing-main-content-wrapper">
					<?php 
						$swing_lite_room_listing_main_title_setting = get_theme_mod( 'swing_lite_room_listing_main_title_setting', esc_html__( 'Welcome To Luxuary Room', 'swing-lite' ) );
						$swing_lite_room_listing_main_subtitle_setting = get_theme_mod( 'swing_lite_room_listing_main_subtitle_setting', esc_html__( 'Luxury', 'swing-lite' ) );
					?>
					<?php if($swing_lite_room_listing_main_title_setting) : ?>
						<div class="title">
							<?php echo esc_html( $swing_lite_room_listing_main_title_setting ); ?>
						</div>
					<?php endif; ?>
					<?php if($swing_lite_room_listing_main_subtitle_setting ) : ?>
						<div class="subtitle">
							<?php echo esc_html( $swing_lite_room_listing_main_subtitle_setting ); ?>
						</div>
					<?php endif; ?>
			</div>
			
			<?php
				$rooms_listing_layouts = get_theme_mod( 'swing_lite_room_listing_layouts_setting', 'grid' );
			?>

			<?php
			$tr_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if(is_object($hb_settings)){
				$post_num = $hb_settings->get( 'posts_per_page' );
			}else{
				$post_num = 10;
			}

			$room_query = new WP_Query( array( 'order' => 'DESC','post_type' => 'hb_room', 'posts_per_page' => $post_num, 'paged' => $tr_paged));
          
          	if( $room_query->have_posts() ) : ?>
          		<div class="<?php echo esc_attr($rooms_listing_layouts); ?>-layout">
					<div class="rooms-section">
						<div class="s-container">
							<div class="rooms-content clear">
					          	<?php while( $room_query->have_posts() ) : $room_query->the_post(); ?>
				          			<?php get_template_part( 'template-parts/room', $rooms_listing_layouts ); ?>
					          	<?php endwhile; ?>
		          			</div>
		          		</div>
		          	</div>
	          	</div>
          	<?php endif; ?>
			
			<nav class="pagination">
			    <?php
					$big = 999999999; // need an unlikely integer
					$translated = esc_html__( 'Page', 'swing-lite' ); // Supply translatable string

					echo wp_kses_post(paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $room_query->max_num_pages,
					        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
					) ) );
				?>
			</nav>
		    <?php wp_reset_postdata(); ?>
		 </main>
	</div>
</div>
<?php
get_footer();