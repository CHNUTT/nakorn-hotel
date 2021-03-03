<?php
  $swing_lite_contact_show_hide = get_theme_mod('swing_lite_contact_show_hide', 'hide');
  if($swing_lite_contact_show_hide == 'show') {
    ?>
    <div class="contact-wrapper sclass section-contact">
      <?php 
        $contact_title = get_theme_mod('swing_lite_home_contact_title_setting', esc_html__( 'Contact Us', 'swing-lite' ) );
        $contact_subtitle = get_theme_mod( 'swing_lite_home_contact_subtitle_setting', esc_html__( 'Get In Touch With Us', 'swing-lite' ) );
        $contact_phone = get_theme_mod( 'swing_lite_home_contact_phone_setting', esc_html__( 'Call Us Ate
9876-457-789', 'swing-lite' ) );
        $contact_address = get_theme_mod( 'swing_lite_home_contact_address_setting', esc_html__( 'Aquaria road citye
oppa-road, 245, centara', 'swing-lite' ) );
        $contact_email = get_theme_mod( 'swing_lite_home_contact_email_setting', esc_html__( 'Email Us Ate
Support@support.com', 'swing-lite' ) );
        $contact_form = get_theme_mod('swing_lite_home_contact_form_setting');
      ?>
      <div class="s-container">
        <div class="content-wrapper">
          <?php if($contact_title != '') { ?>
          <div class="content-title sec-title">
            <?php echo esc_html($contact_title); ?>
          </div>
          <?php } ?>
          <?php if($contact_subtitle != '') { ?>
          <div class="content-text sec-description">
            <?php echo esc_html($contact_subtitle); ?>
          </div>
          <?php } ?>
        </div>
        <div class="s-contact-details">
          <div class="s-contact-details-wrap clear">
          <?php if($contact_phone !='') { ?>
          <div class="s-content-tag-wrap">
          <i class="fa fa-mobile-phone">
          </i>
          <div class="s-content">
            <?php echo wp_kses_post(nl2br($contact_phone)); ?>
          </div>
        </div>
      
          <?php } ?>
          <?php if($contact_address !='') { ?>
          <div class="s-content-tag-wrap">
          <i class="fa fa-map-marker">
          </i>
          <div class="s-content">
            <?php echo wp_kses_post(nl2br($contact_address)); ?>
          </div>
        </div>
          <?php } ?>
          <?php if($contact_email !='') { ?>
          <div class="s-content-tag-wrap">
          <i class="fa fa-envelope">
          </i>
          <div class="s-content">
            <?php echo wp_kses_post($contact_email); ?>
          </div>
        </div>
          <?php } ?>
        </div>
      </div>
        <?php if($contact_form !='') { ?>
        <div class="s-contact-form">
          <?php echo do_shortcode($contact_form); ?>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php
  }