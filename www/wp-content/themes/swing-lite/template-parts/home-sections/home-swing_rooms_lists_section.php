<?php
$swing_lite_room_lists_show_hide = get_theme_mod('swing_lite_room_lists_show_hide', 'hide');
if($swing_lite_room_lists_show_hide == 'show') {
  $queries = new WP_Query( array( 'order' => 'DESC','post_type' => 'hb_room'));
  $rooms_lists_title = get_theme_mod('swing_lite_home_rooms_lists_title_setting', '');
  $rooms_lists_text = get_theme_mod( 'swing_lite_home_rooms_lists_text_setting', esc_html__( 'Duis metus sem, aliquet vitae mi eget, vehicula vehicula enim. In consectetur velit lectus sollicitudin.', 'swing-lite' ) );
  if( $queries->have_posts() ) {
    ?>
    <div class="rooms-lists-wrapper sclass section-rooms_lists">
      <div class="rooms-wrapper s-container">
        <div class="content-wrapper">

          <?php if($rooms_lists_title != '') : ?>
            <div class="content-title sec-title"><?php echo esc_html($rooms_lists_title); ?></div>
          <?php endif; ?>

          <?php if($rooms_lists_text != '') : ?>
            <div class="content-text sec-description"><?php echo esc_html($rooms_lists_text); ?></div>
          <?php endif; ?>

        </div>

        <?php
          if(class_exists('WP_Hotel_Booking')) {
            hotel_booking_room_loop_start();
              while ( $queries->have_posts() ) : $queries->the_post();
                hb_get_template_part( 'wp-hotel-booking/content', 'room' );
              endwhile;
            hotel_booking_room_loop_end();
          } 
        ?>
        <div class="view-all-roms">
          <a href="#"><?php echo esc_html__(' View All Rooms', 'swing-lite'); ?></a>
        </div>
      </div>
    </div>
    <?php
  }
}