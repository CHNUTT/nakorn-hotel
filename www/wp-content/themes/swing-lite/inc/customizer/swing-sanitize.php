<?php 

/**
 * Sanitize switch button
 *
 * @package AccessPress Themes
 * @subpackage swing
 * @since 1.0.0
 */
function swing_lite_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => esc_html__( 'Enable', 'swing-lite' ),
            'hide'  => esc_html__( 'Disable', 'swing-lite' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitize number field
 *
 * @package AccessPress Themes
 * @subpackage swing
 * @since 1.0.0
 */
function swing_lite_sanitize_number( $input ) {
    $output = intval($input);
     return $output;
}

/**
 * Sanitize checkbox field
 *
 * @package AccessPress Themes
 * @subpackage swing
 * @since 1.0.0
 */
function swing_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Sanitize text field
 *
 * @package AccessPress Themes
 * @subpackage swing
 * @since 1.0.0
 */
function swing_lite_text_sanitize( $input ) {
  return wp_kses_post($input);
}

/**
* Sanitize radio 
*
*/
function swing_lite_room_list_radio_sanitize($input){
   $option = array(
               'grid'    =>  esc_html__( 'Grid', 'swing-lite' ),
               'list'    =>  esc_html__( 'List', 'swing-lite' ),
           );  
   if(array_key_exists($input,$option)){
       return $input;
   }else{
       return '';
   }
}

/**
* Sanitize Room Search  radio 
*
*/
function swing_lite_room_search_sanitize($input){
   $option = array(               
        'overslider' => esc_html__( 'Over Slider', 'swing-lite'  ),
        'insectons' => esc_html__( 'In Sections', 'swing-lite'  )
           );  
   if(array_key_exists($input,$option)){
       return $input;
   }else{
       return '';
   }
}


/**
* Sanitize radio 
*
*/
function swing_lite_radio_sanitize($input){
   $option = array(
               'layout1'    =>  esc_html__( 'Layout 1', 'swing-lite' ),
               'layout2'    =>  esc_html__( 'Layout 2', 'swing-lite' ),
               'layout3'    =>  esc_html__( 'Layout 3', 'swing-lite' )
           );  
   if(array_key_exists($input,$option)){
       return $input;
   }else{
       return '';
   }
}

/**
* Sanitize radio 
*
*/
function swing_lite_radio_footer_background_sanitize($input){
   $option = array(
               'background_image'    =>  esc_html__( 'Background Image', 'swing-lite' ),
               'background_color'    =>  esc_html__( 'Background Color', 'swing-lite' )
              
           );  
   if(array_key_exists($input,$option)){
       return $input;
   }else{
       return '';
   }
}

//select sanitization function
function swing_lite_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}