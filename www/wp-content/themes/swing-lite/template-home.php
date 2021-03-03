<?php
/**
 * Template Name: Front Page Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package swing
 */

get_header();

	//banner section
	do_action('swing_lite_banner_frontpage_section');

	$swing_lite_home_order = array(
		'swing_about_section',
                'swing_room_search_section',
                'swing_rooms_lists_section',
                'swing_featured_page1_section',
                'swing_hotel_service_section',
                'swing_featured_page2_section',
                'swing_service_section',
                'swing_testimonial_section',
                'swing_team_section',
                'swing_feature_section',
                'swing_gallery_section',
                'swing_video_section',
                'swing_news_offers_section',
                'swing_partners_section',
                'swing_contact_section',
	);
 	foreach( $swing_lite_home_order as $swing_lite_section ) {
 		get_template_part( '/template-parts/home-sections/home', $swing_lite_section );
 	}
	 
get_footer();