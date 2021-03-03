<?php
  $swing_lite_video_show_hide = get_theme_mod('swing_lite_video_show_hide', 'hide');
  if($swing_lite_video_show_hide == 'show') {
    $video_title = get_theme_mod( 'swing_lite_home_video_title_setting', esc_html__( 'An Adrenalin Rush Lacesd with Luxury', 'swing-lite' ) );
    $video_subtitle = get_theme_mod('swing_lite_home_video_subtitle_setting', esc_html__( 'Best known for its beeaches, coral reefs, and pastel hues. Explore the sparkle just below the surface.', 'swing-lite' ) );
    $background_image = get_theme_mod('swing_lite_home_video_image_setting');
    $video_link = get_theme_mod('swing_lite_home_video_link_setting');
    ?>
    <div class="video-wrapper sclass section-video">
      <?php if($background_image): ?>
        <div class="overlay">
        </div>
      <?php endif; ?>
      <div class="s-container">
        <div class="content-wrapper">
          <?php if($video_title != '') { ?>
          <div class="content-title sec-title">
            <?php echo esc_html($video_title); ?>
          </div>
          <?php } ?>
          <?php if($video_subtitle != '') { ?>
          <div class="content-text sec-description">
            <?php echo esc_html($video_subtitle); ?>
          </div>
          <?php } ?>
          <div class="video-wrap">
            <?php if(!empty($video_link)) { ?>
            <a href='<?php echo esc_url($video_link); ?>' class="swing-video-play iframe"> 
              <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/video-play.png'); ?>" alt="<?php esc_attr_e( 'Video Link', 'swing-lite' ); ?>" />
          </a>
            <?php if (!empty($cta_video_bkg)): ?>
              <img src = "<?php echo esc_url($cta_video_bkg); ?>" />
              <?php if(!empty($cta_video_iframe)):?>
                <a href='<?php echo esc_url($cta_video_iframe); ?>' class="various iframe">
                  <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/video-play.png');?>">
                </a>
              <?php endif;
            endif;
            ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php
  }