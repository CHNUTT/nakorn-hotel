<?php
  $swing_lite_hotel_service_show_hide = get_theme_mod( 'swing_lite_hotel_service_show_hide', 'hide' );
  $swing_lite_hotel_service_title_setting = get_theme_mod('swing_lite_hotel_service_title_setting', '');
  $swing_lite_hotel_service_text_setting = get_theme_mod('swing_lite_hotel_service_text_setting', '');
  $swing_lite_hotel_service_lists = get_theme_mod( 'swing_lite_hotel_service_lists', '' );
  $swing_lite_hotel_service_lists = json_decode($swing_lite_hotel_service_lists, true);
?>
<?php if( $swing_lite_hotel_service_show_hide == 'show' ) : ?>
<div class="hotel-service-wrapper sclass section-hotel_service clearfix" >
        
  <div class="s-container ">
    <?php if($swing_lite_hotel_service_title_setting || $swing_lite_hotel_service_text_setting) : ?>
      <div class="hotel-services-titlewrap">
        <?php if($swing_lite_hotel_service_title_setting) : ?>
          <h2 class="hotel-services-title"><?php echo esc_html($swing_lite_hotel_service_title_setting); ?></h2>
        <?php endif; ?>

        <?php if($swing_lite_hotel_service_text_setting) : ?>
          <div class="hotel-services-title"><?php echo wp_kses_post($swing_lite_hotel_service_text_setting); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if( !empty( $swing_lite_hotel_service_lists ) ) : ?>
      <ul class="hotel-services-list">
        <?php foreach( $swing_lite_hotel_service_lists as $service ) : ?>
          <li>
            <div class="hotel-service-title-text">
              <?php if( $service['service_title'] ) : ?>
                <h4>
                  <span>
                    <?php echo pll__( $service['service_title'] ); ?>
                  </span>
                  <?php if( $service['service_price'] ) : ?>
                    <span><?php echo pll__( $service['service_price'] ); ?></span>
                  <?php endif; ?>
                </h4>
              <?php endif; ?>

              <?php if( $service['service_text'] ) : ?>
                <p><?php echo pll__( $service['service_text'] ); ?></p>
              <?php endif; ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>