<?php
  $swing_lite_service_show_hide = get_theme_mod('swing_lite_service_show_hide', 'hide');
  if($swing_lite_service_show_hide == 'show') {
  $background_image = get_theme_mod('swing_lite_home_service_image_setting');
  $service_title = get_theme_mod('swing_lite_home_service_title_setting');
  $service_text = get_theme_mod('swing_lite_home_service_text_setting');
  ?>
  <div class="service-wrapper sclass section-service">
    <?php if($background_image): ?>
      <div class="overlay">
      </div>
    <?php endif; ?>
    <div class="s-container">
      <div class="content-wrapper">

      <?php if($service_text != '') { ?>
      <div class="content-text sec-subtitle">
        <?php echo esc_html($service_text); ?>
      </div>
      <?php } ?>
      <?php if($service_title != '') { ?>
      <div class="content-title sec-title">
        <?php echo esc_html($service_title); ?>
      </div>
      <?php } ?>

      <div class="button-links">
        <?php 
        $button_label = get_theme_mod( 'swing_lite_home_service_button_label_setting', esc_html__( 'Explore OUR HOTEL', 'swing-lite' ) );
        $button_url = get_theme_mod('swing_lite_home_service_button_link_setting');
        if( $button_label && $button_url ) {
          ?>
          <a href="<?php echo esc_url($button_url);?>"> 
            <?php echo esc_html($button_label); ?> 
          </a>
          <?php } ?>
        </div>
      </div>
      </div>
    </div>
    <?php 
  }