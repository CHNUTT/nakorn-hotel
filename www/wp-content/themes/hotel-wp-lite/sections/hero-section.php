<?php
// $hotel_wp_option array declared in functions.php
global $hotel_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}

?>

<section id="custom-page" style="background: <?php echo esc_attr( $hotel_wp_option['hero_section_background_color'] ); ?>;">
<div class="svc-section-body section-padding" >
<div class="container">
	 <div class="row">
	 
		<?php if($hotel_wp_option['hero_section_title']!=''): ?>
		<div class="title-wrap">
			<div class="title-box">
				<?php if($hotel_wp_option['hero_section_description']!=''): ?>		
					<div class="fancy section-desc"><span><?php echo esc_html($hotel_wp_option['hero_section_description']); ?></span></div>
				<?php endif; ?>
				<h1 class="section-title text-center"><?php echo esc_html( $hotel_wp_option['hero_section_title'] ); ?></h1>
			</div>
		</div>
		<?php endif; ?>

	 </div>
	 
	 <div class="row">
		  <div class="col-sm-12 col-xs-12">
		  <?php 
		  if($hotel_wp_option['hero_section_page']!=''){
				// turn on the read more tags in pages	
				$hotel_wp_page = absint($hotel_wp_option['hero_section_page']);
				$hotel_wp_args = array( 'post_type' => 'page','ignore_sticky_posts' => 1 , 'post__in' => array($hotel_wp_page) );
				$hotel_wp_result = new WP_Query($hotel_wp_args);
				while ( $hotel_wp_result->have_posts() ) :
					$hotel_wp_result->the_post();
					the_content();
				endwhile; // End of the loop.
				wp_reset_postdata(); 
		   }
		  ?>
		  </div> 
	 </div>	  
		<div class="row text-center">
		<?php if($hotel_wp_option['hero_section_url']!=''): ?>
		<a class="more-btn" href="<?php echo esc_url( $hotel_wp_option['hero_section_url'] ); ?>"><?php echo esc_html($hotel_wp_option['hero_section_button_text']); ?></a>
		<?php endif; ?>	
		</div>	 	  
    </div>
</div>
</section> 
<!-- #svc-home-skill -->

