<?php

/********************
*  contact Settings *
*********************/

		$wp_customize->add_section( 'contact_section' , array(
			'title'      => __('Contact', 'hotel-wp-lite' ),			
			'description'=>  __('Add all your contact details. Contact details will display in header, footer and contact section. Google maps and more options Go Pro version.', 'hotel-wp-lite' ),
			'panel' => 'theme_options',
		) );
		
		
		$wp_customize->selective_refresh->add_partial( 'hotel_wp_option[contact_section_title]', array(
			'selector' => '#contact .section-title',
		) );	
			
				
		// contact section header show / hide
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_hide_header]' , array(
		'default'    => false,
		'sanitize_callback' => 'hotel_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_hide_header]' , array(
		'label' => __('Hide Contact Header','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'checkbox',
		) );		
		
		// address
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_address]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_address]' , array(
		'label' => __('Address','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// email
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_email]' , array(
		'default'    => 'mail@yourdomain.com',
		'sanitize_callback' => 'sanitize_email',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_email]' , array(
		'label' => __('Email:','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'hotel_wp_option[contact_section_email]', array(
			'selector' => '.contact-list-top',
		) );		
		
		// phone
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_phone]' , array(
		'default'    => '9876543210',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_phone]' , array(
		'label' => __('Phone:','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// fax
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_fax]' , array(
		'default'    => '1234567890',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_fax]' , array(
		'label' => __('Fax:','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// work hours
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_hours]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_hours]' , array(
		'label' => __('Work Hours 1','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );

		// work hours 2
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_hours_2]' , array(
		'default'    => __('Saturday 8.00 AM - 1.00 PM','hotel-wp-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_hours_2]' , array(
		'label' => __('Work Hours 2','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'hotel_wp_option[contact_section_background_color]',
			array(
				'default'     => '#ffffff',
				'type'        => 'option',			
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		// background Alpha Color Picker control
		$wp_customize->add_control(
			new Hotel_WP_Alpha_Color_Control(
				$wp_customize,
				'hotel_wp_option[contact_section_background_color]',
				array(
					'label'         =>  __('Background Color','hotel-wp-lite' ),
					'section'       => 'contact_section',
					'settings'      => 'hotel_wp_option[contact_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> hotel_wp_color_codes(),
				)
			)
		);

		// contact section title
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_title]' , array(
		'default'    => __('Contact Us','hotel-wp-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_title]' , array(
		'label' => __('Section Title','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// contact section description
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[contact_section_description]' , array(
		'label' => __('Section Subtitle','hotel-wp-lite' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// contact section shortcode
		$wp_customize->add_setting( 'hotel_wp_option[contact_section_shortcode]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('hotel_wp_option[contact_section_shortcode]' , array(
		'label' => __('Contact Form 7 Shortcode','hotel-wp-lite' ),
		'description' => sprintf('<a href="%1$s"> %2$s </a>',
						 esc_url(get_site_url().'/wp-admin/plugin-install.php?s=contact%20form%207&tab=search&type=term'),
						 esc_html__('Click here to install contact form plugin. Create a contact form and add shortcode','hotel-wp-lite')),
		'section' => 'contact_section',
		'type'=>'text',
		) );		
		
	