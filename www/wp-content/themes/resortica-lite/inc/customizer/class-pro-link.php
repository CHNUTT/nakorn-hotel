<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Resortica_Lite_Link_Customize {

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

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( get_template_directory(). '/inc/customizer/section-pro-link.php' );

		// Register custom section types.
		$manager->register_section_type( 'Resortica_Lite_Discount_Customize_link_Pro' );

		// Register sections.
		$manager->add_section(
			new Resortica_Lite_Discount_Customize_link_Pro(
				$manager,
				'resortica_lite_to_pro_link',
				array(

					'pro_text' => wp_kses_post( "Resortica Premium Theme is live on Theme Forest.", 'resortica-lite' ),
					'pro_url'  => 'https://themeforest.net/item/resortica-responsive-wordpress-theme-for-hotels-resorts/20226373?ref=code_themes',
					'priority' => 1,
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
Resortica_Lite_Link_Customize::get_instance();
