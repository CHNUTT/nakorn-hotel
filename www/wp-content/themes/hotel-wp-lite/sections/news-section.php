<?php
// $hotel_wp_option array declared in functions.php

global $hotel_wp_option;
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}

$class = '';
if($hotel_wp_option['news_section_image']!=''){
	$class = 'sectionoverlay';
}

?>  
	<section id="news" style="background:url('<?php echo esc_url( $hotel_wp_option['news_section_image'] ); ?>') fixed center <?php echo esc_attr( $hotel_wp_option['news_section_image_repeat'] ); ?> <?php echo esc_attr( $hotel_wp_option['news_section_background_color'] ); ?>;">
		<div class="svc-section-body section-padding  <?php echo esc_attr( $class );?>" > 
			<div class="container">
			
				<div class="row">
					
				<?php if($hotel_wp_option['news_section_title']!=''): ?>
				<div class="title-wrap">
					<div class="title-box">
						<?php if($hotel_wp_option['news_section_description']!=''): ?>		
							<div class="fancy section-desc"><span><?php echo esc_html($hotel_wp_option['news_section_description']); ?></span></div>
						<?php endif; ?>
						<h1 class="section-title text-center"><?php echo esc_html( $hotel_wp_option['news_section_title'] ); ?></h1>
					</div>
				</div>
				<?php endif; ?>					
					
				</div>
				
				<div class="row">
				<div class="col-sm-8">
				<?php if( $hotel_wp_option['news_category_show'] != "" ) : ?> 
					<?php 
					$hotel_wp_cat_id = $hotel_wp_option['news_category_show'];
					$news_no_of_show = $hotel_wp_option['news_no_of_show'];
					
					$args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'cat' =>  $hotel_wp_cat_id , 'posts_per_page' => absint( $news_no_of_show ) );
					
					$news_query = new WP_Query($args);
					$i=1;
					while($news_query->have_posts() ) : $news_query->the_post();
					?>
					<div class="col-sm-6 col-xs-12 ">
						<div class="featured-news">
							<?php if( has_post_thumbnail() ): ?>
						    <div class="image-area">
								<a href="<?php the_permalink(); ?>">
									<?php 
									$thumb_id = get_post_thumbnail_id(get_the_ID());
									$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
									the_post_thumbnail('full',array( 'alt' => $alt )); 
									?>
								</a>							
							</div>
							<?php endif; ?>
							
							<div class="news-featured">
								<h4 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<span><?php echo esc_attr(  get_the_date( get_option('date_format') ) ); ?></span>
								<p>
								<?php
								$hotel_wp_more = '... <p><a class="more-link" href="'. esc_url( get_the_permalink() ).'">'.esc_html__('Read More','hotel-wp-lite').'</a></p>';
								echo apply_filters( 'the_content', wp_trim_words( get_the_content(), 14, $hotel_wp_more ) ); ?>
								</p>
							</div>
						</div>
					</div>
				
					<?php 
					if($i==3) { echo '<div class="clearfix"></div>'; $i=0; } $i++;
					endwhile;					
					wp_reset_postdata();
					?>
					<?php endif; ?>
				</div> <!--end of news column-->
				
				<div class="col-sm-4  col-xs-12">
					<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Home Blog', 'hotel-wp-lite' ); ?>">
						<?php 
						if (is_active_sidebar('home-blog-1') ) {
							dynamic_sidebar( 'home-blog-1' );					
						} else {
							get_sidebar();
						} 
						?>
					</aside><!-- #secondary -->					
				</div> <!--end of sidebar column-->
				
				</div>
				
				
			</div>
		</div>
	</section><!-- #svc-home-news -->
