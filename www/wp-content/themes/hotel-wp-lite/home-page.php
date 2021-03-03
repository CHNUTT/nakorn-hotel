<?php

/*  
* Template Name:Home-Page
* Home page of the site   
*/

get_header();

//get options
global $hotel_wp_option;	 
if ( class_exists( 'WP_Customize_Control' ) ) {
   $hotel_wp_default_settings = new hotel_wp_settings();
   $hotel_wp_option = wp_parse_args(  get_option( 'hotel_wp_option', array() ) , $hotel_wp_default_settings->default_data());  
} 

?>
<main id="main" class="site-main" role="main">
<?php

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/page/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.

?>
</main>
<!-- #main -->
<?php 
get_footer();
