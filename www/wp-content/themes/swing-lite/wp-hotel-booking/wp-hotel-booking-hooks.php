<?php
	/**
	 *
	 * Hotel Booking Plugin Hooks Customizations
	 *
	 **/

	/** Adding Starting Theme Wrapper **/
	add_action( 'hotel_booking_before_main_content', 'swing_lite_hotel_booking_output_content_wrapper', 9 );
	function swing_lite_hotel_booking_output_content_wrapper() {
		?>
		<div class="s-container">
			<div id="primary" class="primary">
		<?php
	}

	/** Add End Theme Wrapper **/
	add_action( 'hotel_booking_after_main_content', 'swing_lite_hotel_booking_output_content_wrapper_end', 11 );
	function swing_lite_hotel_booking_output_content_wrapper_end() {
		?>
			</div>
		<?php get_sidebar(); ?>
		</div> <!-- s-container -->
		<?php
	}

	/** Changing the location to display title and price **/
   	remove_action( 'hotel_booking_single_room_title', 'hotel_booking_room_title' );
   	remove_action( 'hotel_booking_loop_room_price', 'hotel_booking_loop_room_price' );

   	add_action( 'hotel_booking_single_room_gallery', 'swing_lite_hotel_booking_room_title_and_price' );
   	function swing_lite_hotel_booking_room_title_and_price() {
   		?>
   		<div class="title">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		</div>
		<?php
			if( function_exists( 'hotel_booking_loop_room_price' ) ) {
				hotel_booking_loop_room_price();
			}
   	}

   	/** Remove Related Books **/
   	remove_action( 'hotel_booking_after_single_product', 'hotel_booking_single_room_related' );

   	/** Customizing Room Single Page Tab **/
   	add_filter( 'hotel_booking_single_room_infomation_tabs', 'swing_lite_remove_description_tab' );
   	function swing_lite_remove_description_tab($tabsInfo) {
		unset($tabsInfo[0]);
		return $tabsInfo;
   	}