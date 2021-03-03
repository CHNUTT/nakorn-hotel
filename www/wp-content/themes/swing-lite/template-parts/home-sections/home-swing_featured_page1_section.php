<?php
  $swing_lite_feat_page1_show_hide = get_theme_mod( 'swing_lite_feat_page1_show_hide', 'hide' );
  $swing_lite_feat_page1 = get_theme_mod('swing_lite_feat_page1', 0);
?>
<?php if( $swing_lite_feat_page1_show_hide == 'show' && $swing_lite_feat_page1 ) : ?>
<div class="hotel-featured-page1-wrapper sclass section-featured_page1 clearfix" >
        
  <div class="s-container ">
	<?php
		$swing_lite_feat_page1_query = new WP_Query( array(
			'page_id' => $swing_lite_feat_page1,
		) );

		if( $swing_lite_feat_page1_query->have_posts() ) {
			while( $swing_lite_feat_page1_query->have_posts() ) {
				$swing_lite_feat_page1_query->the_post();
				the_content();
			}
		}
	?>
  </div>
</div>
<?php endif; ?>