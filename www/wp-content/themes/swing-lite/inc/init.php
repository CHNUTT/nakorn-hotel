<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since unicon 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('swing_lite_file_directory') ){

    function swing_lite_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}


/**
 * Implement the Custom Functions.
 */
require $swing_lite_custom_functions_file_path = swing_lite_file_directory('inc/functions.php');

/**
 * Implement the Custom Header feature.
 */
require $swing_lite_custom_header_file_path = swing_lite_file_directory('inc/core/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require $swing_lite_template_tags_file_path = swing_lite_file_directory('inc/core/template-tags.php');

/**
 * Custom template functions for this theme.
 */
require $swing_lite_template_tags_file_path = swing_lite_file_directory('inc/core/template-functions.php');

/**
 * Load Customizer File.
 */
require $swing_lite_lite_customizer_file_path = swing_lite_file_directory('inc/customizer/customizer.php');

/**
 * WP Hotel Booking Hooks
 */
require $swing_lite_lite_customizer_file_path = swing_lite_file_directory('wp-hotel-booking/wp-hotel-booking-hooks.php');

/**
 * Woocommerce Hooks
 */
require $swing_lite_lite_customizer_file_path = swing_lite_file_directory('woocommerce/woocommerce-hooks.php');

/**
 * Load Header Hooks Compatibility file.
 */
require $swing_lite_header_file_path = swing_lite_file_directory('inc/hooks/header.php');

/**
 * Load Footer Hooks Compatibility file.
 */
require $swing_lite_header_file_path = swing_lite_file_directory('inc/hooks/footer.php');

/**
 * Theme Metaboxes.
 */
require $swing_lite_widget_file_path = swing_lite_file_directory('inc/swing-metabox.php');

/**
 * Welcome Page.
 */
require $swing_lite_widget_file_path = swing_lite_file_directory('inc/welcome/welcome-config.php');