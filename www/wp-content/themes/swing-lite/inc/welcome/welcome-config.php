<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/inc/welcome/welcome');

	/** Plugins **/
	$th_plugins = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(

				'siteorigin-panels' => array(
					'slug' => 'siteorigin-panels',
					'filename' => 'siteorigin-panels.php',
					'class' => 'SiteOrigin_Panels'
				),

				'contact-form-7' => array(
					'slug' => 'contact-form-7',
					'filename' => 'wp-contact-form-7.php',
					'class' => 'WPCF7'
				),

				'so-widgets-bundle' => array(
					'slug' => 'so-widgets-bundle',
					'filename' => 'so-widgets-bundle.php',
					'class' => 'SiteOrigin_Widgets_Bundle'
				),

				'wp-hotel-booking' => array(
					'slug' => 'wp-hotel-booking',
					'filename' => 'wp-hotel-booking.php',
					'class' => 'WP_Hotel_Booking'
				),

			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'swing-lite'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'swing-lite'),
			),
		

		),

		// *** Recommended Plugins
		'recommended_plugins' => array(
			// Free Plugins
			'free_plugins' => array(
				
			),

			// Pro Plugins
			'pro_plugins' => array(

			)
		),
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Swing Lite Info', 'swing-lite' ),
		'theme_short_description' => esc_html__( 'Swing Lite is a beautiful Hotel WordPress Template, specifically designed to showcase your hospitality industry like hotel, resort, accommodation, and rooms for rent. However, The template is also versatile to be used with Corporate and Agency Websites too. It is bundled up with WP Hotel Booking plugin which helps you to easily manage your rooms listings, customer bookings and reservations online, pricing plans and coupons. With its beautiful design, and high coding quality, this template can showcase your unique accommodations to the world and attract more visitors to your website.For demo https://demo.accesspressthemes.com/swing-lite', 'swing-lite' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'swing-lite'),
		'deactivate' 			=> esc_html__('Deactivate', 'swing-lite'),
		'activate' 				=> esc_html__('Activate', 'swing-lite'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'swing-lite'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'swing-lite'),
		'doc_link'			=> 'https://doc.accesspressthemes.com/swing-lite/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'swing-lite' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'swing-lite'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'swing-lite' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'swing-lite' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'swing-lite' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'swing-lite'),
		'installed_btn' 	=> esc_html__('Activated', 'swing-lite'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'swing-lite'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'swing-lite'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'swing-lite'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'swing-lite' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'swing-lite' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'swing-lite' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'swing-lite' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'swing-lite' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Swing_Lite_Welcome( $th_plugins, $strings );