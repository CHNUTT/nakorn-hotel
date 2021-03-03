<?php
		/* Slider Settings */
		
		$wp_customize->add_section( 'slider_section' , array(
			'title'      => __('Home Slider', 'hotel-wp-lite' ),			
			'description'=> __('Show your slider in your front page. Create posts and assign it to a category. Select the post from post dropdown below. Unlimited sliders Go Pro version.', 'hotel-wp-lite' ),
			'panel' => 'theme_options',
		) );
		
		// contact section header show / hide
		$wp_customize->add_setting( 'hotel_wp_option[show_slider]' , array(
		'default'    => true,
		'sanitize_callback' => 'hotel_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[show_slider]' , array(
		'label' => __('Show header slider','hotel-wp-lite' ),
		'section' => 'slider_section',
		'type'=>'checkbox',
		) );		
		
	
		// slider animation type
		$wp_customize->add_setting( 'hotel_wp_option[slider_animation_type]' , array(
		'default'    => 'fade',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[slider_animation_type]' , array(
		'label' => __('Slider Effects','hotel-wp-lite' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			'slide'=>'Slide',
			'fade'=>'Fade',
		),
		) );
		
		// slider speed
		$wp_customize->add_setting( 'hotel_wp_option[slider_speed]' , array(
		'default'    => 3000,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[slider_speed]' , array(
		'label' => __('Slider animation speed(ms)','hotel-wp-lite' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			500 => 500,
			1000 => 1000,
			2000 => 2000,
			3000 => 3000,
			4000 => 4000,
			5000 => 5000,
			6000 => 6000,
			7000 => 7000,
			8000 => 8000,
			9000 => 9000,
			10000 => 10000,
			20000 => 20000,
			40000 => 40000,
			80000 => 80000,
			120000 => 120000,
		),
		) );
	
	
		// service button title
		$wp_customize->add_setting( 'hotel_wp_option[slider_button_text]' , array(
		'default'    => __('Click Here to Begin','hotel-wp-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[slider_button_text]' , array(
		'label' => __('Featured Button text','hotel-wp-lite' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );		
		
		// service button url
		$wp_customize->add_setting( 'hotel_wp_option[slider_button_url]' , array(
		'default'    => '#service',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[slider_button_url]' , array(
		'label' => __('Featured Button URL','hotel-wp-lite' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );
		
        $wp_customize->add_setting( 'slider_label1', array(
            'default'        => __('Select Posts with featured image','hotel-wp-lite' ),
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new Hotel_WP_Label_Custom_control( $wp_customize, 'slider_label1', array(
            'label'   => __('Select Posts with featured image','hotel-wp-lite' ),
            'section' => 'slider_section',
        ) ) );		
	
		//posts  object
		global $hotel_wp_all_posts;
	
		// post 1
		$wp_customize->add_setting( 'hotel_wp_option[slider_cat]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[slider_cat]' , array(
		'label' => __('Select Post 1','hotel-wp-lite' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> $hotel_wp_all_posts,
		) );
		
		$wp_customize->selective_refresh->add_partial( 'hotel_wp_option[slider_cat]', array(
			'selector' => '#main_Carousel .carousel-caption',
		) );
		
		// post 2
		$wp_customize->add_setting( 'hotel_wp_option[slider_cat2]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[slider_cat2]' , array(
		'label' => __('Select Post 2','hotel-wp-lite' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> $hotel_wp_all_posts, 
		) );
		
					
		
