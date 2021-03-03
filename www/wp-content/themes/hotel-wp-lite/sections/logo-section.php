<?php
// $hotel_wp_option array declared in functions.php
global $hotel_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}
$hotel_wp_options_section_contents  = get_theme_mod( 'options_section_contents' );

?>

<section id="options-callout">
<div class="svc-section-body section-padding " >
<div class="container"> 
  <div> 
	<div class="col-sm-3 col-xs-12 options-callout">
			<?php if( !empty($hotel_wp_option['options_section_option1'])){ ?>
			<i class="fa <?php echo esc_attr($hotel_wp_option['options_section_option1'],'hotel-wp-lite'); ?>" >&nbsp;<?php echo esc_html('Luxury Rooms','hotel-wp-lite'); ?></span></i>
			<?php } ?>                   
	</div>

	<div class="col-sm-3 col-xs-12 options-callout">
			<?php if( !empty($hotel_wp_option['options_section_option2'])){ ?>
			<i class="fa <?php echo esc_attr($hotel_wp_option['options_section_option2'],'hotel-wp-lite'); ?>" >&nbsp;<?php echo esc_html('Free Wify','hotel-wp-lite'); ?></span></i>
			<?php } ?>                   
	</div>
	
	<div class="col-sm-3 col-xs-12 options-callout">
			<?php if( !empty($hotel_wp_option['options_section_option3'])){ ?>
			<i class="fa <?php echo esc_attr($hotel_wp_option['options_section_option3'],'hotel-wp-lite'); ?>" >&nbsp;<?php echo esc_html('Delicious Food','hotel-wp-lite'); ?></span></i>
			<?php } ?>                   
	</div>

	<div class="col-sm-3 col-xs-12 options-callout">
			<?php if( !empty($hotel_wp_option['options_section_option4'])){ ?>
			<i class="fa <?php echo esc_attr($hotel_wp_option['options_section_option4'],'hotel-wp-lite'); ?>" >&nbsp;<?php echo esc_html('Free Parking','hotel-wp-lite'); ?></span></i>
			<?php } ?>                   
	</div>
	
  </div>
</div>

</section> 

