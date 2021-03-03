<?php
/**
* Swing repeater customizer
*
* @package Swing
*/

/**
* Load scripts for repeater 
*/
function swing_lite_enqueue_repeater_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'swing-lite-repeater-script', get_template_directory_uri() . '/inc/customizer/repeater-controller/repeater-script.js',array( 'jquery', 'jquery-ui-sortable'), time(), true);
    wp_enqueue_style('swing-lite-repeater-style',get_template_directory_uri() . '/inc/customizer/repeater-controller/repeater-style.css');
} add_action( 'customize_controls_enqueue_scripts', 'swing_lite_enqueue_repeater_scripts');

/**
* Repeater customizer
*/
add_action( 'customize_register', 'swing_lite_repeaters_customize_register' );
function swing_lite_repeaters_customize_register( $wp_customize ) {
    
require get_template_directory().'/inc/customizer/repeater-controller/repeater-class.php';
    
/**
* Repeater Sanitize
*/
    function swing_lite_sanitize_repeater($input){      
        $input_decoded = json_decode( $input, true );
        $allowed_html = array(
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'a' => array(
                'href' => array(),
                'class' => array(),
                'id' => array(),
                'target' => array()
            ),
            'button' => array(
                'class' => array(),
                'id' => array()
            )
        );    

        if(!empty($input_decoded)) {
            foreach ($input_decoded as $boxes => $box ){
                foreach ($box as $key => $value){
                    $input_decoded[$boxes][$key] = sanitize_text_field( $value );
                }
            }
            return json_encode($input_decoded);
        }    
        return $input;
    }
    
}