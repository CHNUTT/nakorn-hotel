<?php

/*********************** 
* Footer customization *
***********************/

		$wp_customize->add_section( 'footer_section' , array(
			'title'      => __('Footer Customizer', 'hotel-wp-lite' ),			
			'description'=> __('Customize footer. Add widgets Go Customizer -> Widgets. Background image, background color, Footer bottom link and background color customization Go Pro version.', 'hotel-wp-lite' ),
		    'panel' => 'theme_options',
		) );
		
		// footer section bottom background text
		$wp_customize->add_setting( 'hotel_wp_option[footer_section_bottom_text]' , array(
		'default'    => __('A Theme by Ceylon Themes','hotel-wp-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('hotel_wp_option[footer_section_bottom_text]' , array(
		'label' => __('Footer Bottom Text','hotel-wp-lite' ),
		'section' => 'footer_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'hotel_wp_option[footer_section_bottom_text]', array(
			'selector' => '.site-info',
		) );			
