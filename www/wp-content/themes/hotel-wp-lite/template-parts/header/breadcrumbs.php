<?php
global $hotel_wp_option;
if(!$hotel_wp_option['home_header_section_disable']){
	hotel_wp_breadcrumbs();
} elseif ((!is_front_page() )){ 
	hotel_wp_breadcrumbs();
} elseif ('posts' == get_option( 'show_on_front' )){
	hotel_wp_breadcrumbs();
}
function hotel_wp_breadcrumbs() {		
	global $post;
	$url='';
	$homeLink = esc_url( home_url() );
?> 	
	<div class="sub-header" style="background:url('<?php echo esc_url(get_header_image()); ?>');">
	
	<div class="sub-header-inner sectionoverlay">
	<?php 
	if(is_search()){
		echo '<div class="title">'. esc_html__('Search Results','hotel-wp-lite').'</div>';
	} else if( is_404() ){
		echo '<div class="title">'. esc_html__('Page not Found','hotel-wp-lite').'</div>';
	} else if( is_category() ){
		echo '<div class="title">'. esc_html__('Category','hotel-wp-lite').'</div>';
	} else if( is_archive() ){
		echo '<div class="title">'. esc_html__('Archive','hotel-wp-lite').'</div>';
	} else {
	    echo '<div class="title">'.esc_html(get_the_title()).'</div>';
	}
	
	if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	}

	?>
	
	</div>
</div><!-- .sub-header -->
<?php 
}