<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Resortica_Lite_Donate_Customize {

	/**
	 * Returns the instance.
	 *
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

	}

	/**
	 * Sets up the customizer sections.
	 *
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( get_template_directory(). '/inc/customizer/section-pro-donate.php' );

		// Register custom section types.
		$manager->register_section_type( 'Resortica_Lite_Donate_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Resortica_Lite_Donate_Customize_Section_Pro(
				$manager,
				'resortica_lite_to_pro_donate',
				array(

					'pro_text' => wp_kses_post( "Like our theme? Help us grow.", 'resortica-lite' ),
					'pro_url'  => 'https://paypal.me/CodeThemesDonate',
					'priority' => 1,
					'panel'	   => 'theme_options'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'resortica-lite-customize-controls', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'resortica-lite-customize-controls',get_template_directory_uri() . '/inc/customizer/css/customizer-control.css' );
	}
}

// Doing this customizer thang!
Resortica_Lite_Donate_Customize::get_instance();
