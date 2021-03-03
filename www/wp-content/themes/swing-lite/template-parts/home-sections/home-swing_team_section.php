<?php
  $swing_lite_team_show_hide = get_theme_mod('swing_lite_team_show_hide', 'hide');
  $swing_lite_team_category = get_theme_mod('swing_lite_team_category', 0);
  if($swing_lite_team_show_hide == 'show') {
    $team_title = get_theme_mod( 'swing_lite_home_team_title_setting', esc_html__( 'Our Dedicated Team', 'swing-lite' ) );
    $team_text = get_theme_mod('swing_lite_home_team_text_setting');
    ?>
    <div class="team-wrapper sclass section-team">
      <div class="s-container">
        <div class="content-wrapper">
          <?php if($team_title != '') { ?>
          <div class="content-title sec-title">
            <?php echo esc_html($team_title); ?>
          </div>
          <?php } ?>
          <?php if($team_text != '') { ?>
          <div class="content-text sec-description">
            <?php echo esc_html($team_text); ?>
          </div>
          <?php } ?>
        </div>
        <div class="clear team-left-right-wrap">
          <div class="team-items-wrapper">
            <div class="dedicated-staff-wrapper">
              <div class="title">
                <?php 
                $dedicated_team_title = get_theme_mod( 'swing_lite_home_best_in_team_title_setting', esc_html__( '24/7 Feel truly at home', 'swing-lite' ) );
                echo esc_html($dedicated_team_title);
                ?>
              </div>
              <div class="sub-title">
                <?php 
                $dedicated_team_sub_title = get_theme_mod( 'swing_lite_home_best_in_team_sub_title_setting', esc_html__( 'Get Best From Best', 'swing-lite' ) );
                echo esc_html($dedicated_team_sub_title);
                ?>
              </div>
              <div class="content">
                <?php 
                $dedicated_team_text_setting = get_theme_mod( 'swing_lite_home_best_in_team_text_setting', esc_html__( 'Duis metus sem, aliquet vitae mi eget, vehicula vehicula enim. In consectetur velit lectusr, Duis metus sem, aliquet vitae msi eget, vehicula vehicula enim.', 'swing-lite' ) );
                echo esc_html(nl2br($dedicated_team_text_setting));
                ?>
              </div>
            </div>
          </div>
          <div class="team-items-main-wrap">
          <div class="team-items owl-carousel owl-theme">
            <?php 
            $queries = new WP_Query( array(
              'cat' => $swing_lite_team_category,
              
            )); 
            if($queries->have_posts()) {
              while($queries->have_posts()) : $queries->the_post();
                ?>
                <div class="teams">
                  <div class="team-image">
                    <?php 
                    $swing_lite_img = wp_get_attachment_image_src(get_post_thumbnail_id(),
                      'swing-lite-team-image');
                    $swing_lite_img_src = $swing_lite_img[0];
                    $alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                    if (has_post_thumbnail()) { 
                      ?>
                      <img src="<?php echo esc_url($swing_lite_img_src); ?>" alt="<?php echo esc_attr($alt); ?>" />
                      <?php 
                    }
                    ?>
                  </div>

                  <div class="team-title">
                    <div class="s-team-title">
                      <?php the_title(); ?> 
                    </div>
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); } ?>
            </div>
          </div>
          </div>
        </div>
      </div>
      <?php
    }