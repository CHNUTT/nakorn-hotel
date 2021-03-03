<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hotel-wp-lite

 */

$hotel_wp_default_settings = new hotel_wp_settings();
$hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());

$hotel_wp_class = '';
$hotel_wp_bottom_color = esc_attr( $hotel_wp_option['footer_section_bottom_background_color'] );

$hotel_wp_class = $hotel_wp_class. ' footer-foreground';

if($hotel_wp_option['options_section_enable']) {
	hotel_wp_featured_area( 'logo') ;
}
?>

<footer id="colophon" role="contentinfo" class="site-footer  <?php echo esc_attr( $hotel_wp_class );?>" style="background:<?php echo esc_attr( $hotel_wp_option['footer_section_background_color'] ); ?>;">
  <div class="footer-section <?php echo esc_attr( $hotel_wp_class );?>" >
    <div class="container">
	<!--widgets area-->
	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'hotel-wp-lite' ); ?>">
		<?php
		if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
			</div>			
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
			</div>
        <?php }	?>
	</aside><!-- .widget-area -->

      <div class="col-md-12">
        <center>
          <ul id="footer-social" class="header-social-icon animate fadeInRight" >
            <?php if($hotel_wp_option['social_facebook_link']!=''){?>
            <li><a href="<?php echo esc_url($hotel_wp_option['social_facebook_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','hotel-wp-lite'); ?>"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($hotel_wp_option['social_twitter_link']!=''){?>
            <li><a href="<?php echo esc_url($hotel_wp_option['social_twitter_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','hotel-wp-lite'); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if($hotel_wp_option['social_skype_link']!=''){?>
            <li><a href="<?php echo esc_url($hotel_wp_option['social_skype_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','hotel-wp-lite'); ?>"><i class="fa fa-skype"></i></a></li>
            <?php } ?>
            <?php if($hotel_wp_option['social_googleplus_link']!=''){?>
            <li><a href="<?php echo esc_url($hotel_wp_option['social_googleplus_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="google-plus" data-toggle="tooltip" title="<?php esc_attr_e('Google-Plus','hotel-wp-lite'); ?>"><i class="fa fa-google-plus"></i></a></li>
            <?php } ?>				
          </ul>
        </center>
      </div>
      <div class="col-md-12 bottom-menu">
        <center>         
		  	<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'container_class' => 'bottom-menu'
				)
			);
			?>
        </center>
      </div>
	  
    </div>
    <!-- .container -->
	
    <!-- bottom footer -->
    <div class="col-md-12 site-info" style="background:<?php echo esc_attr($hotel_wp_bottom_color); ?>">
      <p align="center" style="color:#fff;" > <a href="<?php echo HOTEL_WP_THEME_AUTHOR_URL; ?>"> <?php echo esc_html($hotel_wp_option['footer_section_bottom_text']); ?> </a> </p>
    </div>
    <!-- end of bottom footer -->	
	
  </div>
  <a id="scroll-btn" style="display: block;" href="#" class="scroll-top"><i class="fa fa-arrow-up"></i></a>
</footer>
<!-- #colophon -->
<?php 
global $hotel_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}
if($hotel_wp_option['box_layout']){
	// end of wrapper div
	echo '</div>';
}

wp_footer(); 
?>
</body>
</html>