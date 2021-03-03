<?php
/**
 * The header
 * @package hotel-wp-lite
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
wp_head();
//get settings array 
global $hotel_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
}
?>
</head>
<body <?php body_class(); ?> >
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}

	if($hotel_wp_option['box_layout']){
	  echo '<div class="wrap-box">';
	}
?>

<!-- The Search Modal Dialog -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span id="search-close" class="close">&times;</span>
	<br/> <br/>
    <?php get_search_form(); ?>
	<br/> 
  </div>
</div><!-- end search model-->

<div id="page" class="site">



<a class="skip-link screen-reader-text" href="#primary">
<?php esc_html_e( 'Skip to content', 'hotel-wp-lite' ); ?>
</a>
<header id="masthead" class="site-header" role="banner">

	<!-- start of mini header -->
	<?php if(!$hotel_wp_option['contact_section_hide_header']): ?>	      
			<div class="mini-header hidden-xs">
				<div class="container vertical-center">
					
						<div class="col-md-7 col-sm-7 lr-clear-padding">
						 
							<ul class="contact-list-top ">
							<?php if($hotel_wp_option['contact_section_phone']!=''): ?>					  
								<li><i class="fa fa-phone "></i><span style="margin-left:10px"><?php echo esc_html($hotel_wp_option['contact_section_phone']); ?></span></li>
							<?php endif; ?>
							<?php if($hotel_wp_option['contact_section_email']!=''): ?>
								<li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_html( $hotel_wp_option['contact_section_email'] ); ?>"><span style="margin-left:10px"><?php echo esc_html($hotel_wp_option['contact_section_email']); ?></span></a></li>
							<?php endif; ?>
							<?php if($hotel_wp_option['contact_section_address']!=''): ?>
								<li><i class="fa fa-map"></i><a href="mailto:<?php echo esc_html( $hotel_wp_option['contact_section_address'] ); ?>"><span style="margin-left:10px"><?php echo esc_html($hotel_wp_option['contact_section_address']); ?></span></a></li>
							<?php endif; ?>							
							</ul>
						 
						</div>
						<div class="col-md-5 col-sm-5 lr-clear-padding">			
							<ul class="mimi-header-social-icon pull-right animate fadeInRight" >
								<?php if(class_exists('woocommerce')) { ?><li class="my-cart"><?php do_action( 'woocommerce_cart_top' ); ?></li><?php } ?>																				
								<?php if($hotel_wp_option['social_facebook_link']!=''){?> <li><a href="<?php echo esc_url($hotel_wp_option['social_facebook_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','hotel-wp-lite'); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
								<?php if($hotel_wp_option['social_twitter_link']!=''){?> <li><a href="<?php echo esc_url($hotel_wp_option['social_twitter_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','hotel-wp-lite'); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
								<?php if($hotel_wp_option['social_skype_link']!=''){?> <li><a href="<?php echo esc_url($hotel_wp_option['social_skype_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','hotel-wp-lite'); ?>"><i class="fa fa-skype"></i></a></li><?php } ?>
								<?php if($hotel_wp_option['social_googleplus_link']!=''){?> <li><a href="<?php echo esc_url($hotel_wp_option['social_googleplus_link']); ?>" target="<?php if($hotel_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="google-plus" data-toggle="tooltip" title="<?php esc_attr_e('Google-Plus','hotel-wp-lite'); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
							</ul>
						</div>	
					
				</div>	
			</div>
		<?php endif; ?>		
	 <!-- .end of contacts mini header -->  
	 
  <!--top menu, site branding-->
 <div>
   <div class="container vertical-center"> 
    <div class="col-md-4 col-sm-4 site-branding" >
	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
    <?php the_custom_logo(); ?>
    <?php endif; ?>
      <div class="site-branding-text">
        <?php if ( is_front_page() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
          </a></h1>
        <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
		
        <?php $hotel_wp_description = get_bloginfo( 'description', 'display' ); if ( $hotel_wp_description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo esc_html($hotel_wp_description); ?></p>
        <?php endif; ?>
      </div>
      <!-- branding-text -->
    </div>
    <!-- end of site-branding -->
	
	<!-- start of navigation menu -->
    <div class="col-md-8 col-sm-8">
			<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top" style="font-size:<?php  echo absint(get_theme_mod( 'navigation_font_size','15'));?>px">
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'hotel-wp-lite' ); ?>">
					<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
						<?php
						echo hotel_wp_get_fo( array( 'icon' => 'bars' ) );
						echo hotel_wp_get_fo( array( 'icon' => 'close' ) );
						esc_html_e( 'Menu', 'hotel-wp-lite' );
						?>
					</button>
				
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'top',
							'menu_id'        => 'top-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>			
			<!-- end of navigation-top -->
			<?php endif; ?>
  
    </div>  
	<!-- end of navigation menu --> 
	
   </div>
   <!-- .container -->	
  </div>
  <!-- #masthead -->
  
</header>

<?php if($hotel_wp_option['show_slider'] && is_front_page()) { hotel_wp_featured_area( 'slider'); } ?>
<?php if($hotel_wp_option['booking_section_enable']) { hotel_wp_featured_area( 'booking'); } ?>
<?php get_template_part( 'template-parts/header/breadcrumbs'); ?>