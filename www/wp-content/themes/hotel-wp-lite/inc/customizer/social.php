<?php

/******************** 
*   Social options  *
********************/		

		$wp_customize->add_section( 'social_section' , array(
			'title'      => __('Social', 'hotel-wp-lite' ),			
			'description'=> __('Display social icons and links in site header and footer. More social links Go Pro version.', 'hotel-wp-lite' ),
			'panel' => 'theme_options',
		) );
		
		
		$wp_customize->add_setting( 'hotel_wp_option[social_open_new_tab]' , array(
		'default'    => 1,
		'sanitize_callback' => 'hotel_wp_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('hotel_wp_option[social_open_new_tab]' , array(
		'label' => __('Open Social Link in New Tab','hotel-wp-lite' ),
		'section' => 'social_section',
		'type'=>'checkbox',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'hotel_wp_option[social_open_new_tab]', array(
			'selector' => '.mimi-header-social-icon',
		) );


		$wp_customize->add_setting( 'hotel_wp_option[social_facebook_link]' , array(
		'default'    => 'facebook.com',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->selective_refresh->add_partial( 'hotel_wp_option[social_facebook_link]', array(
			'selector' => '#footer-social',
		) );
		
		$wp_customize->add_control('hotel_wp_option[social_facebook_link]' , array(
		'label' => __('Facebook Link','hotel-wp-lite' ),
		'section' => 'social_section',
		'type'=>'text',
		) );

		$wp_customize->add_setting( 'hotel_wp_option[social_twitter_link]' , array(
		'default'    => 'twitter.com',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('hotel_wp_option[social_twitter_link]' , array(
		'label' => __('Twitter Link','hotel-wp-lite' ),
		'section' => 'social_section',
		'type'=>'text',
		) );


		$wp_customize->add_setting( 'hotel_wp_option[social_skype_link]' , array(
		'default'    => 'skype.com',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('hotel_wp_option[social_skype_link]' , array(
		'label' => __('Skype Link','hotel-wp-lite' ),
		'section' => 'social_section',
		'type'=>'text',
		) );							

		$wp_customize->add_setting( 'hotel_wp_option[social_googleplus_link]' , array(
		'default'    => 'plus.google.com',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('hotel_wp_option[social_googleplus_link]' , array(
		'label' => __('Google Plus Link','hotel-wp-lite' ),
		'section' => 'social_section',
		'type'=>'text',
		) );		
