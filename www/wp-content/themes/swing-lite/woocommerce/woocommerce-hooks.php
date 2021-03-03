<?php
	/**
	 *
	 * Woocommerce Hooks & Functions
	 *
	 **/
	add_action( 'woocommerce_before_main_content', 'swing_lite_woocommerce_output_content_wrapper', 9 );
	function swing_lite_woocommerce_output_content_wrapper() {
		echo '<div class="s-container clear">';
	}

	add_action( 'woocommerce_sidebar', 'swing_lite_woocommerce_output_content_wrapper_end', 11 );
	function swing_lite_woocommerce_output_content_wrapper_end() {
		echo '</div>';
	}

	/** Remove Woocommerce Archive Title **/
	add_filter( 'woocommerce_show_page_title', 'swing_lite_woo_remove_archive_title' );
	function swing_lite_woo_remove_archive_title() {
		return false;
	}
    
    /** Remove WooCommerce Breadcrumb from main content area **/
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

    // woocomerce breadcrumb
	if ( class_exists( 'WooCommerce' ) ) {
		function swing_lite_woo_breadcrumb() {
			$args = array(
				'delimiter' => ' / ',
				'before' => '<span class="breadcrumb-title"></span>'
			);
		 	woocommerce_breadcrumb( $args );
		}
		
	}

	// woocommerce shop page products columns
	add_filter('loop_shop_columns', 'swing_lite_loop_columns');
	if (!function_exists('swing_lite_loop_columns')) {
		function swing_lite_loop_columns() {
			return 3;
		}
	}

	if( !function_exists( 'swing_lite_main_menu_notif' ) ) {
		function swing_lite_main_menu_notif()  {
			echo "<div class='menu-create-notif'>";
			printf( '%1$s <a target="_blank" href="%2$s">%3$s</a> to Display', esc_html__( 'Create a', 'swing-lite' ), esc_url(admin_url('nav-menus.php')), esc_html__( 'Menu', 'swing-lite' ), esc_html__( 'to Display', 'swing-lite' ) );
			echo "</div>";
		}
	}