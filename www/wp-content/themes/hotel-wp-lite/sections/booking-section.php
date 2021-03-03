<?php
// $hotel_wp_option array declared in functions.php
global $hotel_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}

?>

<section id="booking"> 
<div class="svc-section-body>
	<div class="container">
	<?php 
	if($hotel_wp_option['booking_section_shortcode']!=''){
		echo do_shortcode( $hotel_wp_option['booking_section_shortcode'] );
	}
	?>
	</div>
</div>
</section>
<!-- #svc-home-booking -->

