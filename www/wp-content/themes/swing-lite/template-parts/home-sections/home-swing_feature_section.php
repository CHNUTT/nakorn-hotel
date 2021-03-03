<?php
  $swing_lite_feature_show_hide = get_theme_mod('swing_lite_feature_show_hide', 'hide');
  if($swing_lite_feature_show_hide == 'show') {
    $feature_title = get_theme_mod( 'swing_lite_home_feature_title_setting', esc_html__( 'Experience & Indulge in Activities', 'swing-lite' ) );
    $feature_text = get_theme_mod( 'swing_lite_home_feature_text_setting', esc_html__( 'Our blissful atmosphere, attentive service, facilities and the combination of tradition, hospitality and the elegance of simplicity is the answer to your dream holidas', 'swing-lite' ) );
    $background_image = get_theme_mod('swing_lite_home_feature_image_setting');
    ?>
    <div class="feature-wrapper sclass section-feature">
      <?php if($background_image): ?>

        <div class="overlay">
        </div>
      <?php endif; ?>
      <div class="s-container">
        <div class="content-wrapper">
          <?php if($feature_title != '') { ?>
          <div class="content-title sec-title">
            <?php echo esc_html($feature_title); ?>
          </div>
          <?php } ?>
          <?php if($feature_text != '') { ?>
          <div class="content-text sec-description">
            <?php echo esc_html($feature_text); ?>
          </div>
          <?php } ?>
        </div>
        <div class="feature-items clear">
          <?php 
          $feature_icons = get_theme_mod('swing_lite_feature_icons');
          $feature_tabs  = json_decode( $feature_icons, true );
          if($feature_tabs != '') {
            foreach($feature_tabs as $datas ) {
              ?>
              <?php if( $datas['feature_page'] ) : ?>
                <?php
                  $feat_page = get_post($datas['feature_page']);
                  $feat_img = wp_get_attachment_image_src( get_post_thumbnail_id( $datas['feature_page']  ), 'swing-lite-testimonial-image' );
                  $feat_img_icon = ($feat_img[0]) ? $feat_img[0] : $datas['feature_icon'];
                  $feat_title = $feat_page->post_title;
                  $feat_content = $feat_page->post_content;
                ?>
                <div class="features">
                  <div class="features-icon">
                    <?php if( $feat_img[0] ) : ?>
                      <img src="<?php echo esc_url($feat_img_icon); ?>" />
                    <?php else : ?>
                      <i class="<?php echo esc_attr($feat_img_icon); ?>"></i>
                    <?php endif; ?>
                  </div>

                  <?php if( $feat_title || $feat_content ) : ?>
                    <div class="features-content">
                      <?php if( $feat_title ) : ?>
                        <div class="s-feature-title">
                          <?php echo esc_html(strip_tags($feat_title)); ?> 
                        </div>
                      <?php endif; ?>
                      <?php  if($feat_content) : ?>
                        <div class="s-feature-content"> 
                          <?php echo esc_html(strip_tags(strip_shortcodes($feat_content))); ?> 
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php  } } ?>
            </div>
          </div>
        </div>
        <?php
      }