<?php
$swing_lite_testimonial_show_hide = get_theme_mod('swing_lite_testimonial_show_hide', 'hide');
$swing_lite_testimonial_category = get_theme_mod('swing_lite_testimonial_category', 0);
if($swing_lite_testimonial_show_hide == 'show') {
$testimonial_title = get_theme_mod( 'swing_lite_home_testimonial_title_setting', esc_html__( 'swing_lite_home_testimonial_title_setting', 'swing-lite' ) );
$testimonial_text = get_theme_mod( 'swing_lite_home_testimonial_text_setting', esc_html__( 'Proin quis turpis semper, onsectetur velit lectus, sit amet sollicitudin ipsum suscipit sed. Integer ut urna site', 'swing-lite' ) );
?>
<div class="testimonial-wrapper sclass section-testimonial">
  <div class="content-wrapper s-container">
    <?php if($testimonial_title != '') { ?>
    <div class="content-title sec-title">
      <?php echo esc_html($testimonial_title); ?>
    </div>
    <?php } ?>
    <?php if($testimonial_text != '') { ?>
    <div class="content-text sec-description">
      <?php echo esc_html($testimonial_text); ?>
    </div>
    <?php } ?>
  </div>
  <div class="s-container">
    <div class="testimonials-items owl-carousel owl-theme owl-loaded">

      <?php 
      $queries = new WP_Query( array(
        'cat' => $swing_lite_testimonial_category,
      )); 
      if($queries->have_posts()) {
        while($queries->have_posts()) : $queries->the_post();
          ?>
          <div class="testimonials">
            <div class="testimonials-image">
              <?php 
              $swing_lite_img = wp_get_attachment_image_src(get_post_thumbnail_id(),
                'swing-lite-testimonial-image');
              $swing_lite_img_src = $swing_lite_img[0];
              $alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
              if (has_post_thumbnail()) { 
                ?>
                <img src="<?php echo esc_url($swing_lite_img_src); ?>" alt="<?php echo esc_attr($alt); ?>" />
                <?php 
              }
              ?>
            </div>
            <div class="testimonials-content">
              <?php the_excerpt(); ?>
            </div>
            <div class="testimonials-title">
              <div class="testi-title">
                <?php the_title(); ?> 
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); } ?>
      </div>
    </div>
  </div>
  <?php
}