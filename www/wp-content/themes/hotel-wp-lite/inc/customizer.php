<?php
/**
 * hotel-wp-lite: Customizer
 * @package hotel-wp-lite
 * @since 1.0
 */
 
add_action( 'customize_register', 'hotel_wp_customizer_settings' ); 
function hotel_wp_customizer_settings( $wp_customize ) {

// Go pro control
$wp_customize->add_section( 'hotel_wp_lite' , array(
			'title'      	=> __( 'Go Pro Version', 'hotel-wp-lite' ),
			'priority' => 1,
		) );

		$wp_customize->add_setting( 'hotel_wp_lite', array(
			'default'    		=> null,
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( new hotel_wp_more_Control( $wp_customize, 'hotel_wp_lite', array(
			'label'    => __( 'Hotel WP Premium', 'hotel-wp-lite' ),
			'section'  => 'hotel_wp_lite',
			'settings' => 'hotel_wp_lite',
			'priority' => 1,
		) ) );

/*******************
 * Layout options. *
 *******************/

		$wp_customize->add_section( 'layout_section' , array(
			'title'      => __('Layout', 'hotel-wp-lite' ),			
			'description'=> __('Change site layout. Change Single Post display layout, Default is two columns (with sidebar). In pages - use full width template to hide sidebar', 'hotel-wp-lite' ),
		) );
		
		// site layout default / box layout 
		$wp_customize->add_setting( 'hotel_wp_option[box_layout]' , array(
		'default'    => 0,
		'sanitize_callback' => 'hotel_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[box_layout]' , array(
		'label' => __('Enable box layout mode','hotel-wp-lite' ),
		'description' =>  __('Enable or disable Box layout mode. Default is fluid layout.','hotel-wp-lite' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
	
		// layout 
		$wp_customize->add_setting( 'hotel_wp_option[layout_section_post_one_column]' , array(
		'default'    => 0,
		'sanitize_callback' => 'hotel_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[layout_section_post_one_column]' , array(
		'label' => __('One Column Single Post Layout','hotel-wp-lite' ),
		'description' =>  __('Display single post in one column (No Sidebar)','hotel-wp-lite' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
		
/*****************
 * Theme options.*
*****************/
 
$wp_customize->add_panel( 'theme_options', array(
  'title' => __('Theme Options','hotel-wp-lite' ),
  'description' => __('Theme specific customization options', 'hotel-wp-lite' ), // Include html tags such as <p>.
  'priority' => 2, // Mixed with top-level-section hierarchy.
) );


// featured areas
require HOTEL_WP_TEMPLATE_DIR.'/inc/customizer/contact.php';	
require HOTEL_WP_TEMPLATE_DIR.'/inc/customizer/slider.php';
require HOTEL_WP_TEMPLATE_DIR.'/inc/customizer/booking.php';


require HOTEL_WP_TEMPLATE_DIR.'/inc/customizer/social.php';	
require HOTEL_WP_TEMPLATE_DIR.'/inc/customizer/features.php';

require HOTEL_WP_TEMPLATE_DIR.'/inc/customizer/fonts.php';
require HOTEL_WP_TEMPLATE_DIR.'/inc/customizer/footer.php';

			
/****************************
default customizer settings *
*****************************/		

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'hotel_wp_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'hotel_wp_customize_partial_blogdescription',
		)
	);
	
	/**
	 * Custom colors.
	 */
	 
	$wp_customize->add_setting(
		'colorscheme', array(
			'default'           => 'brown',
			'transport'         => 'refresh',
			'sanitize_callback' => 'hotel_wp_sanitize_colorscheme',
		)
	);

	$wp_customize->add_setting(
		'colorscheme_color', array(
			'default'           => '#eda81b',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
		)
	);
	
	$wp_customize->add_control(
		'colorscheme', array(
			'type'     => 'radio',
			'label'    => __( 'Color Scheme', 'hotel-wp-lite' ),
			'choices'  => array(
				'brown'  => __( 'Brown (Default)', 'hotel-wp-lite' ),		 
				
			),
			'section'  => 'colors',
			'priority' => 5,
			'description' => __('Unlimited Color scheme selection available in Pro Version.', 'hotel-wp-lite' ),
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'colorscheme_color', array(				 
				'section'  => 'colors',
				'priority' => 6,
				
			)
		)
	);
	
	// home header section enable/disable
	$wp_customize->add_setting( 'hotel_wp_option[home_header_section_disable]' , array(
	'default'    => true,	
	'sanitize_callback' => 'hotel_wp_sanitize_checkbox',
	'type'=>'option'
	));
	
	$wp_customize->add_control('hotel_wp_option[home_header_section_disable]' , array(
	'label' => __('Disable home header section.','hotel-wp-lite' ),
	'description'    => __('(Hide header in front page, When home slider enabled)','hotel-wp-lite' ),
	'section' => 'header_image',
	'type'=>'checkbox',
	) );	
	
/************ 
blog settings
*************/						
		$wp_customize->add_section( 'blog_section' , array(
			'title'      => __('Blog', 'hotel-wp-lite' ),			
			'description'=> __('Blog template settings. Create a new page and select blog as the template.', 'hotel-wp-lite' ),
			
		) );
		
	
		// sidebar position
		$wp_customize->add_setting( 'hotel_wp_option[blog_sidebar_position]' , array(
		'default'    => 'right',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('hotel_wp_option[blog_sidebar_position]' , array(
		'label' => __('Sidebar position','hotel-wp-lite' ),
		'section' => 'blog_section',
		'type'=>'select',
		'choices'=>array(
			'right'=>__('Right Sidebar','hotel-wp-lite' ),
			'left'=>__('Left Sidebar','hotel-wp-lite' ),
		),
		) );				
		

}

/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function hotel_wp_sanitize_colorscheme( $input ) {
	$valid = array( 'brown', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'brown';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since hotel-wp-lite 1.0
 * @see hotel_wp_customize_register()
 *
 * @return void
 */
function hotel_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since hotel-wp-lite 1.0
 * @see hotel_wp_customize_register()
 *
 * @return void
 */
function hotel_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function hotel_wp_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function hotel_wp_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function hotel_wp_customize_preview_js() {
	wp_enqueue_script( 'hotel-wp-lite-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'hotel_wp_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function hotel_wp_panels_js() {
	wp_enqueue_script( 'hotel-wp-lite-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'hotel_wp_panels_js' );


/**
 * A class to create a dropdown for all categories in your WordPress site
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
	
 class hotel_wp_category_dropdown_custom_control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $hotel_wp_options = array())
    {
        $this->cats = get_categories($hotel_wp_options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     * @return HTML
     */
	 
	 public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
						        printf('<option value="0" selected="selected" >'.esc_html_e('None','hotel-wp-lite').'</option>');
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', esc_attr( $cat->term_id ), selected( $this->value(), esc_attr( $cat->term_id ), false), esc_attr( $cat->name ) );
                                }
                           ?>
                      </select>
                    </label>
                <?php  
            }
       }
 }
 

function hotel_wp_slider_sanitize( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category' ) ) )    
    return $value;
}
 

/*
 * hotel-wp-lite sanitize checkbox function
 */ 
function hotel_wp_sanitize_checkbox( $checked ) {
    // Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitize repeater control.
 */
function hotel_wp_repeater_sanitize( $input ) {
    $input_decoded = json_decode( $input,true );

    if ( ! empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxk => $box ) {
            foreach ( $box as $key => $value ) {

                $input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );

            }
        }
        return json_encode( $input_decoded );
    }
    return $input;
}

/*
 * hotel-wp-lite get post categories
 */

$hotel_wp_categories = hotel_wp_get_post_categories();

/*
 * hotel-wp-lite get all published pages
 */
$hotel_wp_all_posts = hotel_wp_get_all_posts();



function hotel_wp_get_post_categories(){
	$cats = get_categories();
	$arr = array();
	$arr[''] = 'None';
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}

/*
 * hotel-wp-lite get all published pages
 */
 
function hotel_wp_get_all_pages(){

	$args = array(
		'post_type' => 'page',
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'post_status' => 'publish'
	); 

	$pages = get_pages($args);
	$arr = array();
	$arr[''] = 'None';
	foreach($pages as $page){
		$arr[$page->ID] = $page->post_title;
	}
	return $arr;
}

/*
 * hotel-wp-lite get all published posts
 */
 
function hotel_wp_get_all_posts(){

	$args = array(
		'post_type' => 'post',
		'sort_order' => 'desc',
		'sort_column' => 'post_title',
		'post_status' => 'publish'
	); 

	$posts = get_posts($args);
	$arr = array();
	$arr[''] = 'None';
	foreach($posts as $post){
		$arr[$post->ID] = $post->post_title;
	}
	return $arr;
}

/* label control */
if (class_exists('WP_Customize_Control'))
{
     class Hotel_WP_Label_Custom_control extends WP_Customize_Control
     {
          public function render_content()
           {

                ?>
                    <p style='width: 100%; text-align: center; font-weight: 500; margin: 15px 0px 0px;background-color: #fff; border: 1px solid #50e011;padding:5px 0px;'>
                      <span class="customize-category-select-control" style="text-align:center"><?php echo esc_html( $this->label ); ?></span>                      
                    </p>
                <?php
           }
     }
}


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'hotel_wp_more_Control' ) ) :
class hotel_wp_more_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6">					
					<a class="button" style="margin-bottom:20px;margin-left:20px" href="<?php echo esc_url( HOTEL_WP_THEME_URL); ?>" target="blank" class="btn pro-btn-success btn"><?php esc_html_e('Go Hotel WP Pro Version','hotel-wp-lite'); ?> </a>
			</div>
			
			<div class="col-md-4 col-sm-6" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);padding:3px; background-color:#FFF">
				<img  src="<?php echo esc_url(HOTEL_WP_TEMPLATE_DIR_URI .'/screenshot.png'); ?>">
			</div>			
			<div class="col-md-3 col-sm-6" style="font-weight:500;">
				<table class="theme-features" cellspacing="0" align="left">
				<tbody>
				<tr>
				<th scope="col" align="center"><h2><?php esc_html_e('Pro Theme Features','hotel-wp-lite'); ?></h2></th>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><b><?php esc_html_e('* Access to all Themes With Hotel WP Pro Theme','hotel-wp-lite'); ?></b></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('* 12 months customer support, and free updates for each theme purchase for single domain','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('* Woocommerce integration, Booking system integration and online payment support.)', 'hotel-wp-lite'); ?></div></td>
				</tr>			
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('* 5-10 Widgets (News/events, Accordian, Quicklinks, Advanced recent posts, Contact... )','hotel-wp-lite'); ?></div></td>
				</tr>			
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Unlimited services','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited News/Events','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Testimonials/Sliders','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Portfolio','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Team members','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  More Call to action options and customization','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Custom Page selection in featured areas on all templates, any page design with default editor, site orign, elementor ect: can be added to featured sections.','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Stats Section with animations','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Skills/Progress section with animations','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Color Schemes','hotel-wp-lite'); ?></div></td>
				</tr>								
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Pricing table','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  More footer customizations','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  500 + Google Fonts','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Translation Ready','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  One page home template and 15+ Featured section selectors','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  All templates customizable','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Team Template','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Contact Template','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  2 Service Templates','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Stats, Skills/Progress with animations','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  2 Portfolio/Recent Work Templates','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  More accessibility features','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  One page home template','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Sticky navigation','hotel-wp-lite'); ?></div></td>
				</tr>				
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Site content, Header and footer Width adjustment','hotel-wp-lite'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Drag and Drop page design and Page builder template','hotel-wp-lite'); ?></div></td>
				</tr>										
				</tbody>
			  </table>

			</div>
			
			<br />
			<div class="col-md-2 col-sm-6">					
					<a class="button"  style="margin-bottom:20px;margin-left:20px;" href="<?php echo esc_url(HOTEL_WP_THEME_AUTHOR_URL); ?>" target="blank" class="btn pro-btn-success btn"><strong><?php esc_html_e(' Go Pro version or Donate ','hotel-wp-lite'); ?></strong></a>
			</div>

		</label>
		<?php
	}
}
endif;