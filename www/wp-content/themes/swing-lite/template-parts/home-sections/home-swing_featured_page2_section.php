<?php
  $swing_lite_feat_page2_show_hide = get_theme_mod( 'swing_lite_feat_page2_show_hide', 'hide' );
  $swing_lite_feat_page2 = get_theme_mod('swing_lite_feat_page2', 0);
?>
<?php if( $swing_lite_feat_page2_show_hide == 'show' && $swing_lite_feat_page2 ) : ?>
<div class="hotel-featured-page2-wrapper sclass section-featured_page2 clearfix" >
        
  <div class="s-container ">
	<?php
		$swing_lite_feat_page2_query = new WP_Query( array(
			'page_id' => $swing_lite_feat_page2,
		) );

		if( $swing_lite_feat_page2_query->have_posts() ) {
			while( $swing_lite_feat_page2_query->have_posts() ) {
				$swing_lite_feat_page2_query->the_post();
				the_content();
			}
		}
	?>
  </div>
</div>
<?php endif; ?>