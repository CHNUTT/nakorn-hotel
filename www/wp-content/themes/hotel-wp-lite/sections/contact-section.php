<?php
// $hotel_wp_option array declared in functions.php
global $hotel_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}
?>

<section id="contact" style="background:<?php echo esc_attr( $hotel_wp_option['contact_section_background_color'] ); ?>;" >
  <div class="svc-section-body section-padding">
    <div class="container">
  
	<div class="row">		
	
		<?php if($hotel_wp_option['contact_section_title']!=''): ?>
		<div class="title-wrap">
			<div class="title-box">
				<?php if($hotel_wp_option['contact_section_description']!=''): ?>		
					<div class="fancy section-desc"><span><?php echo esc_html($hotel_wp_option['contact_section_description']); ?></span></div>
				<?php endif; ?>
				
				<h1 class="section-title text-center"><?php echo esc_html( $hotel_wp_option['contact_section_title'] ); ?></h1>
			</div>
		</div>
		<?php endif; ?>
	
	</div>  
	  
      <div class="row">
		
       <div class="col-md-8 col-lg-8">
		<?php if( $hotel_wp_option['contact_section_shortcode'] != '' ): ?>
		 <div class="contact-list-form"> 		 
          <?php	echo do_shortcode( $hotel_wp_option['contact_section_shortcode'] );?>
		 </div>
		 <?php endif; ?>
       </div>
		 
		 <div class="col-md-4 col-lg-4">
          <div class="row">
		    
            <ul class="contact-list">
				<?php if($hotel_wp_option['contact_section_phone']!="" || $hotel_wp_option['contact_section_email']!=""  || $hotel_wp_option['contact_section_address']!=""): ?>
			    <h4><?php esc_html_e('Contact Details','hotel-wp-lite'); ?></h4>
				<?php endif; ?>
				<?php if($hotel_wp_option['contact_section_phone']!=""): ?>
				  <li><i class="fa fa-phone"></i><span><?php esc_html_e('Tel: ','hotel-wp-lite'); echo esc_html($hotel_wp_option['contact_section_phone']); ?></span></li>
				<?php endif; ?> 
				<?php if($hotel_wp_option['contact_section_fax']!=""): ?>
				  <li><i class="fa fa-fax"></i><span><?php esc_html_e('Fax: ','hotel-wp-lite'); echo esc_html($hotel_wp_option['contact_section_fax']); ?></span></li>
				<?php endif; ?>
				<?php if($hotel_wp_option['contact_section_email']!=""): ?>  
				  <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr( $hotel_wp_option['contact_section_email'] ); ?>"><span><?php esc_html_e('Email: ','hotel-wp-lite'); echo esc_html($hotel_wp_option['contact_section_email']); ?></span></a></li>
				<?php endif; ?> 
				<?php if($hotel_wp_option['contact_section_address']!=""): ?> 
				  <li><i class="fa fa-map-marker"></i><a href="#map">
				  <span><?php esc_html_e('Address: ','hotel-wp-lite'); echo esc_html($hotel_wp_option['contact_section_address']); ?></span></a></li>
				<?php endif; ?>
				<?php if($hotel_wp_option['contact_section_hours']!=""): ?>
				  <h4><?php esc_html_e('Work Hours','hotel-wp-lite'); ?></h4> 
				  <li><i class="fa fa-clock-o"></i>				  
				  <span><?php echo esc_html($hotel_wp_option['contact_section_hours']); ?></span></li>
				<?php endif; ?>	
				<?php if($hotel_wp_option['contact_section_hours_2']!=""): ?>
				  <h4><?php esc_html_e('Work Hours 2','hotel-wp-lite'); ?></h4> 
				  <li><i class="fa fa-clock-o"></i>	  
				  <span><?php echo esc_html($hotel_wp_option['contact_section_hours_2']); ?></span></li>
				<?php endif; ?>						  
            </ul>
			
          </div>		 
		</div>
		
	   </div>
	   				
	</div>	 
  </div>  
 
</section>
<!-- #svc-home-contact -->

