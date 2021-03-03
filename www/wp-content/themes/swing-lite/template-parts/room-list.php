<?php
  /**
   *
   * Room List Layout
   *
   **/
  global $hb_settings;
?>
    <div class="rooms-loops clear">
        <div class="image-wrapper">
            <a href="<?php the_permalink(); ?>">
              <?php 
                if (has_post_thumbnail()) {
                  $swing_lite_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'swing-lite-room-lists-image');
                  $swing_lite_img_src = $swing_lite_img[0];
                  $alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                  ?>
                  <div class="rooms-thumbnail">
                      <img src="<?php echo esc_url($swing_lite_img_src); ?>" alt="<?php echo esc_attr($alt); ?>" />
                  </div>
                  <?php 
                }
              ?>
            </a>
        </div>

    <div class="rooms-features-wrapper">
        <div class="rooms-title">
            <h3><a href="<?php the_permalink();?>"><?php the_title(); ?> </a></h3>
        </div>
      <div class="room-features">
        <ul class="unique unique-features">
          <?php 
            $rooms_features1 = get_post_meta($post->ID, 'rooms_features1',true);
            $rooms_features2 = get_post_meta($post->ID, 'rooms_features2', true);
            $rooms_features3 = get_post_meta($post->ID, 'rooms_features3', true);
          ?>
          <?php if($rooms_features1 != '') { ?>
          <li> 
            <?php echo esc_html($rooms_features1); ?>
          </li>
          <?php } ?>
          <?php if($rooms_features2 != '') { ?>
          <li> 
            <?php echo esc_html($rooms_features2); ?>
          </li>
          <?php } ?>
          <?php if($rooms_features3 != '') { ?>
          <li> 
            <?php echo esc_html($rooms_features3); ?>
          </li>
          <?php } ?>
        </ul>
      </div>

      <?php if(get_the_content()) : ?>
        <div class="rooms-content">
          <?php echo esc_html(substr(wp_strip_all_tags(get_the_content()), 0, 150)); ?>
        </div>
      <?php endif; ?>

      <div class="s-rooms-price">
        <?php
          $price_display = apply_filters( 'hotel_booking_loop_room_price_display_style',
          $hb_settings->get( 'price_display' ) );
          $prices = hb_room_get_selected_plan( get_the_ID() );
          $prices = isset( $prices->prices ) ? $prices->prices : array();
        ?>
        <?php if ( $prices ): ?>
          <?php
            $min = min( $prices );
            $max = max( $prices );
          ?>
          <div class="price">
            <a class="price-tag" href="<?php the_permalink();?>">
            <span class="title-price">
              <?php echo esc_html__( 'Book Now From ', 'swing-lite' ); ?>
            </span>
            <?php if ( $price_display === 'max' ): ?>
              <span class="price_value price_max">
                <?php echo wp_kses_post(hb_format_price( $max )); ?>
              </span>
            <?php elseif ( $price_display === 'min_to_max' && $min !== $max ): ?>
              <span class="price_value price_min_to_max">
                <?php echo wp_kses_post(hb_format_price( $min )); ?>
                -
                <?php echo wp_kses_post(hb_format_price( $max )); ?>
              </span>
            <?php else: ?>
              <span class="price_value price_min">
                <?php echo wp_kses_post(hb_format_price( $min )); ?>
              </span>
            <?php endif; ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
</div>