<?php
    $swing_lite_news_offers_show_hide = get_theme_mod('swing_lite_news_offers_show_hide', 'hide');
    if($swing_lite_news_offers_show_hide == 'show') {
      $news_offers_title = get_theme_mod( 'swing_lite_home_news_offers_title_setting', esc_html__( 'Latest News & Offers', 'swing-lite' ) );
      $news_offers_subtitle = get_theme_mod('swing_lite_home_news_offers_text_setting', esc_html__( 'Duis metus sem, aliquet vitae mi eget, vehicula vehicula enim. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'swing-lite' ) );
      $news_offers_category = get_theme_mod( 'swing_lite_home_news_offers_category_setting', 0);
      if($news_offers_category) {
        $queries = new WP_Query( array( 'cat' => $news_offers_category ));
        if( $queries->have_posts()){
          ?>
          <div class="news-offers-wrapper sclass section-news_offers">
            <div class="s-container">
              <div class="content-wrapper">
                <?php if($news_offers_title != '') { ?>
                <div class="content-title sec-title">
                  <?php echo esc_html($news_offers_title); ?>
                </div>
                <?php } ?>
                <?php if($news_offers_subtitle != '') { ?>
                <div class="content-text sec-description">
                  <?php echo esc_html($news_offers_subtitle); ?>
                </div>
                <?php } ?>
              </div>
              <div class="news-offers-main-wrap clear">
                <?php 
                while($queries->have_posts()) : $queries->the_post();
                  $categories = get_the_category(get_the_ID());

                  $originalDate = get_the_date();
                  $author_name =  get_the_author();
                  $swing_lite_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'swing-lite-news-offer-image');
                  $swing_lite_img_src = $swing_lite_img[0];
                  ?>
                  
                  <div class="news-offers" style="background-image: url('<?php echo esc_url( $swing_lite_img_src); ?>')" >
                    <div class="overlay"></div>
                    <div class="news-offers-inner-wrap">
                      
                      <div class="events-news">
                        <?php 
                            foreach ($categories as $category) {
                        ?>
                        <div class="events-title">
                          <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>">
                            <span><?php echo esc_html($category->name);?></span>   
                          </a>
                        </div>
                        <?php } ?>
                        
                        <div class="events-desc">
                        <a href="<?php the_permalink()?>"> 
                          <?php the_title();?>
                        </a>
                        </div>
                      </div>
                    
                    <div class="post-attributes">
                      <?php if($author_name) { ?>
                      <span class="post-author"> 
                        <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
                          <?php the_author(); ?>
                        </a> 
                      </span>
                      <?php }if($originalDate) { ?>
                      <span class="post-date"> 
                        <?php esc_html_e(' ON ', 'swing-lite'); ?>
                        <?php echo esc_attr($originalDate); ?> 
                      </span>
                      <?php } ?>
                    </div>
                  </div>
                  </div>
                  
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
            </div>
          </div>
          <?php
        }
      }
    }