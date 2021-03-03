<?php
  $swing_lite_partners_show_hide = get_theme_mod('swing_lite_partners_show_hide', 'hide');
  if($swing_lite_partners_show_hide == 'show') {
    ?>
    <div class="partners-wrapper sclass section-partners">
      <div class="s-container partners-slider owl-carousel owl-theme clear">
        <?php 
        $partners_tabs = get_theme_mod('swing_lite_home_partners_tabs');
        $partners_settings  = json_decode($partners_tabs);
        if($partners_settings != '') {
          foreach($partners_settings as  $datas) {
            ?>
            <div class="partners">
              <?php 
              if($datas->partners_image) {
                $alt = '';
                $image_id = attachment_url_to_postid($datas->partners_image);
                if($image_id){
                  $swing_lite_img = wp_get_attachment_image_src($image_id, 'swing-lite-about-image');
                  $swing_lite_img_src = $swing_lite_img[0];
                  $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                } else {
                  $swing_lite_img_src = $datas->partners_image;
                }
                
                ?>
                <a href='<?php echo esc_url($datas->partners_url); ?>' target="_blank" >
                  <img src="<?php echo esc_url($swing_lite_img_src); ?>" alt="<?php echo esc_attr($alt); ?>"/>
                </a>
                <?php } ?>
              </div>
              <?php } } ?>
            </div>
          </div>
          <?php
        }