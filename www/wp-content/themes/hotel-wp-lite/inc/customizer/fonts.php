<?php

/*****************
 * Custom fonts. *
 *****************/

	$wp_customize->add_section( 'font_section' , array(
		'title'      => __('Fonts', 'hotel-wp-lite' ),			
		'description'=>  __('500+ google fonts. Go Pro version.', 'hotel-wp-lite' ),
		 
	) ); 
	
	$wp_customize->add_setting(
		'navigation_font_size', array(
			'default'           => '16px',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
		)
	);		

	$wp_customize->add_control('navigation_font_size' , array(
	'label' => __('Top Menu Font Size','hotel-wp-lite' ),
	'section' => 'font_section',
	'type'=>'select',
	'choices' => array(
		'14px' => __('14px','hotel-wp-lite' ),
		'15px' => __('15px','hotel-wp-lite' ),
		'16px' => __('16px','hotel-wp-lite' ),
		'17px' => __('17px','hotel-wp-lite' ),
		'18px' => __('18px','hotel-wp-lite' ),
		'19px' => __('19px','hotel-wp-lite' ),
	),
	) );	
	 
	$wp_customize->add_setting(
		'fontsscheme', array(
			'default'           => 'default',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_setting(
		'header_fontfamily', array(
			'default'           => 'PT Sans',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
		)
	);
	
	$wp_customize->add_setting(
		'body_fontfamily', array(
			'default'           => 'Open Sans',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
		)
	);	
	
	
	$wp_customize->add_control(
		'fontsscheme', array(
			'type'     => 'radio',
			'label'    => __( 'Font Scheme', 'hotel-wp-lite' ),
			'choices'  => array(
				'default'  => __( 'Default', 'hotel-wp-lite' ),				 
				'custom' => __( 'Custom', 'hotel-wp-lite' ),
			),
			'section'  => 'font_section',
		)
	);
	
	$wp_customize->add_control( 'header_fontfamily' , array(
	'label' => __('Headings Font Family','hotel-wp-lite'),
	'section' => 'font_section',
	'type'=>'select',
	'choices'=> hotel_wp_font_family(),
	) );
	
	$wp_customize->add_control( 'body_fontfamily' , array(
	'label' => __('Body Font Family','hotel-wp-lite'),
	'section' => 'font_section',
	'type'=>'select',
	'choices'=> hotel_wp_font_family(),
	) );
	
