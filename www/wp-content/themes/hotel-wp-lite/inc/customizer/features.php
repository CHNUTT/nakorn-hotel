<?php

/************************
*   Features Settings   *
*************************/
	
		$wp_customize->add_section( 'options_section' , array(
			'title'      => __('Features Callout', 'hotel-wp-lite' ),			 
			'description'=> __('Add feature icons. Icons will not display until modified. See full list of icons see:- https://fontawesome.com/icons , Icon selectors and call to action section Go Pro version.', 'hotel-wp-lite' ),
			'panel' => 'theme_options',
		) );
		
		// contact section header show / hide
		$wp_customize->add_setting( 'hotel_wp_option[options_section_enable]' , array(
		'default'    => false,
		'sanitize_callback' => 'hotel_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[options_section_enable]' , array(
		'label' => __('Enable Footer Features Callout','hotel-wp-lite' ),
		'section' => 'options_section',
		'type'=>'checkbox',
		) );		
			
		// feature 1
		$wp_customize->add_setting( 'hotel_wp_option[options_section_option1]' , array(
		'default'    => 'fa-bed',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('hotel_wp_option[options_section_option1]' , array(
		'label' => __('Bedroom icon','hotel-wp-lite' ),
		'section' => 'options_section',
		'type'=>'text',
		) );
		
		// feature 2
		$wp_customize->add_setting( 'hotel_wp_option[options_section_option2]' , array(
		'default'    => 'fa-wifi',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('hotel_wp_option[options_section_option2]' , array(
		'label' => __('Wifi internet Icon','hotel-wp-lite' ),
		'section' => 'options_section',
		'type'=>'text',
		) );
		
		// feature 3
		$wp_customize->add_setting( 'hotel_wp_option[options_section_option3]' , array(
		'default'    => 'fa-beer',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('hotel_wp_option[options_section_option3]' , array(
		'label' => __('Foods and Drinks Icon','hotel-wp-lite' ),
		'section' => 'options_section',
		'type'=>'text',
		) );
		
		// feature 4
		$wp_customize->add_setting( 'hotel_wp_option[options_section_option4]' , array(
		'default'    => 'fa-car',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('hotel_wp_option[options_section_option4]' , array(
		'label' => __('Parking Icon','hotel-wp-lite' ),
		'section' => 'options_section',
		'type'=>'text',
		) );				
