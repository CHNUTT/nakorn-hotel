<?php

/*
 * default settings 
 */
if( !class_exists('hotel_wp_settings') ){
	
	class hotel_wp_settings {
	
		function default_data(){
			return array(
			
		
			'widget_posts' => 1,			
			'blog_sidebar_position' => 'right',	//value not displayed to user	
			'home_header_section_disable' => 1,
					
			'show_slider' => false ,
			'slider_animation_type' => 'fade', //value not displayed to user
			'slider_cat' => '',
			'slider_cat2' => '',
			'slider_cat3' => '',
			'slider_image_height' => 500,
			'slider_button_text' => __("Click Here to Begin",'hotel-wp-lite'),
			'slider_button_url' => "#service",
			'slider_speed' => 3000,			
			
			'layout_section_post_one_column' => 0 ,	
			'box_layout' => 0 ,	
	
			'booking_section_shortcode' => '',
			'booking_section_enable' => 1,

			'options_section_enable' => false,
			'options_section_background_color' => '#ffffff',
			'options_section_option1' => '',	
			'options_section_option2' => '',	
			'options_section_option3' => '',	
			'options_section_option4' => '',
			
			'social_facebook_link' => '',
			'social_twitter_link' => '',
			'social_skype_link' => '',
			'social_googleplus_link' => '',
			'social_open_new_tab' => 1,
	
			'contact_section_enable' => 1,
			'contact_section_hide_header' => 0,
			'contact_section_description' => '',
			'contact_section_title' => __('Contact us','hotel-wp-lite'),
			'contact_section_background_color' => '#ffffff',   
			'contact_section_shortcode' => '',
			'contact_section_address' => '',
			'contact_section_email' => '',
			'contact_section_fax' => '',
			'contact_section_phone' => '',
			'contact_section_hours' => '',
			'contact_section_hours_2' => '',
	
			'footer_section_background_color' => '#0b0601',	
			'footer_section_bottom_background_color' => '#000',	
			'footer_foreground_color' => '#fff',		
            'footer_section_bottom_text' =>  __('A Theme by Ceylon Themes','hotel-wp-lite'),			
					
			);
		}
	}	

}

