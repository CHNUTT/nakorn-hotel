<?php

/************************
* Introduction Settings *
*************************/
	
		$wp_customize->add_section( 'booking_section' , array(
			'title'      => __('Bookings Search', 'hotel-wp-lite' ),			 
			'description'=> __('Add booking search shortcode from booking plugin such as Woocommerce booking, WP Hotel booking. Woocommerce shopping cart integration and payment options Go Pro version.', 'hotel-wp-lite' ),
			'panel' => 'theme_options',
		) );
			
		// booking section shortcode
		$wp_customize->add_setting( 'hotel_wp_option[booking_section_shortcode]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('hotel_wp_option[booking_section_shortcode]' , array(
		'label' => __('Booking Shortcode','hotel-wp-lite' ),
		'description' => sprintf('<a href="%1$s"> %2$s </a>',
						 esc_url(get_site_url().'/wp-admin/plugin-install.php?s=hotel-booking&tab=search&type=term'),
						 esc_html__('Click here to install booking plugin. Install and add WP Hotel Booking plugin.','hotel-wp-lite')),
		'section' => 'booking_section',
		'type'=>'text',
		) );					
