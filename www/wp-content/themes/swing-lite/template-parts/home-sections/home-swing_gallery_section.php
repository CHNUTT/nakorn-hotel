<?php
  $swing_lite_gallery_show_hide = get_theme_mod('swing_lite_gallery_show_hide', 'hide');
  if($swing_lite_gallery_show_hide == 'show') {
    $gallery_title = get_theme_mod( 'swing_lite_home_gallery_title_setting', esc_html__( 'Hotel Gallery', 'swing-lite' ) );
    $gallery_text = get_theme_mod( 'swing_lite_home_gallery_text_setting', esc_html__( 'Maecenas sed diam eget risus varius blandit sit amr. Maescenas sed diam eget risus varius blandit sit amet non magna.', 'swing-lite' ) );
    ?>
    <div class="gallery-wrapper sclass section-gallery">
      <div class="s-container">
        <div class="content-wrapper">
          <?php if($gallery_title != '') { ?>
          <div class="content-title sec-title">
            <?php echo esc_html($gallery_title); ?>
          </div>
          <?php } ?>
          <?php if($gallery_text != '') { ?>
          <div class="content-text sec-description">
            <?php echo esc_html($gallery_text); ?>
          </div>
          <?php } ?>
        </div>
        <div class="grid">
        <?php 
          $i = 0;
          $swing_lite_home_gallery_tabs = get_theme_mod('swing_lite_home_gallery_tabs');
          $gallery_tabs  = json_decode($swing_lite_home_gallery_tabs);
          if($gallery_tabs != '') {
          foreach($gallery_tabs as  $datas) {

          $swing_lite_img_url = $datas->gallery_image;

          if ($swing_lite_img_url != '') { 
            $alt = '';
            $image_id = attachment_url_to_postid($swing_lite_img_url);
            if($image_id) {

              $swing_lite_img = wp_get_attachment_image_src($image_id, 'swing-lite-gallery-image');
              $swing_lite_img_src = $swing_lite_img[0];
              $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            } else {
              $swing_lite_img_src = $swing_lite_img_url;
            }
        ?>
          <div class="grid-sizer"></div>
          <div class="grid-item">
        
            <a data-fancybox="gallery" href="<?php echo esc_url($datas->gallery_image);?>">
              <span class="button-plus">+</span>
              <img src="<?php echo esc_url($swing_lite_img_src); ?>" alt="<?php echo esc_attr($alt); ?>"/>
            </a>
          
          </div>
        <?php 
              } 
            $i++; 
          } 
        } 
        ?>
        </div>
      </div>
    </div>
    <?php
  }