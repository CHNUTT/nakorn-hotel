<?php
// $hotel_wp_option array declared in functions.php

global $hotel_wp_option;
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}

//set query args to show specified amount or show all posts from particular category. 
$post_ids = array();
if(absint($hotel_wp_option['room_cat'])!=''){
	array_push($post_ids,absint($hotel_wp_option['room_cat']));
}
if(absint($hotel_wp_option['room_cat2'])!=''){
	array_push($post_ids,absint($hotel_wp_option['room_cat2']));
}
if(absint($hotel_wp_option['room_cat3'])!=''){
	array_push($post_ids,absint($hotel_wp_option['room_cat3']));
}

$args = array( 'post_type' => 'post' , 'post__in' => $post_ids , 'orderby'   => 'post__in', 'order' => 'DESC') ;
$loop = array();
if (count($post_ids)!='0'){
	$loop = get_posts($args);
}

$class = '';
if($hotel_wp_option['room_section_image']!=''){
	$class = 'sectionoverlay';
}

?>  
<section id="room" style="background:url('<?php echo esc_url( $hotel_wp_option['room_section_image'] ); ?>') fixed center <?php echo esc_attr( $hotel_wp_option['room_section_image_repeat'] ); ?> <?php echo esc_attr( $hotel_wp_option['room_section_background_color'] ); ?>;">
<div class="svc-section-body section-padding  <?php echo esc_attr( $class );?>" > 
	<div class="container">
		
	<div class="row">
		
		<?php if($hotel_wp_option['room_section_title']!=''): ?>
		<div class="title-wrap">
			<div class="title-box">
				<?php if($hotel_wp_option['room_section_description']!=''): ?>		
					<div class="fancy section-desc"><span><?php echo esc_html($hotel_wp_option['room_section_description']); ?></span></div>
				<?php endif; ?>
				
				<h1 class="section-title text-center"><?php echo esc_html( $hotel_wp_option['room_section_title'] ); ?></h1>
			</div>
		</div>
		<?php endif; ?>			
		
	</div>
				
	<div class="row">
	
      <?php 
		$i = 0;
		$count = count($loop);
		
		for($i=0 ; $i < $count ; $i++):
		$room_post = $loop[$i];
		
		$room_title = $room_post->post_title;
		$text = $room_post->post_content;
		$thumb_id = get_post_thumbnail_id($room_post->ID);
		$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		$image = get_the_post_thumbnail_url($room_post->ID, 'full');
		$room_link = get_the_permalink($room_post->ID);
		if($alt==''){
			$alt = $room_title;
		}
	?>
	
		<div class="col-md-4 col-sm-4 ">
			<div class="featured-room">
				<?php if ( ! empty( $image ) ) : ?>
					<div class="image-area">
					 <img class="img" src="<?php echo esc_url( $image ); ?>"  alt="<?php echo esc_attr( $alt ); ?>" />			 
					</div>
				<?php endif; ?>
				<div class="room-featured">
				
					<h4 class="class="room-type"">
						<a href="<?php echo esc_url( $room_link ); ?>">
							<?php echo esc_html( $room_title ); ?>	</a>
					</h4>
										
					<?php if ( ! empty( $text ) ) { ?>
					<p>
					<?php
					 $hotel_wp_more = '... <p><a class="more-link" href="'. esc_url( $room_link ).'">'.esc_html__('View More','hotel-wp-lite').'</a></p>';
					 echo apply_filters('the_content',  wp_trim_words( $text , 15, $hotel_wp_more ) );
					?>
					</p>
					<?php } ?>							
				</div>						
			</div>                   
		</div>
		  <?php if(($i+1)%3 == 0) echo '<div class=clearfix></div>'; ?>
		  <?php endfor; ?>     
				
	  </div>			
	</div>
  </div>
</section><!-- #svc-home-room -->
