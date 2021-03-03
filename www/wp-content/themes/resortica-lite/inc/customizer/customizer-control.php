<?php
if( ! class_exists('WP_Customize_Control') ){
  return NULL;
}

class Resortica_Lite_Support_Control extends WP_Customize_Control {

      /**
       * Render the content on the theme customizer page
       */
       public $type = "resortica-lite-support";

         public function enqueue() {
         wp_enqueue_style( 'resortica-lite-customizer-style', trailingslashit( get_template_directory_uri() ) . '/inc/customizer/css/customizer-control.css' );
        /* js */
      }

      public function render_content() {
         //Add Theme instruction, Support Forum, Demo Link, Rating Link

         ?><p>
              <a class="resortica-lite-support" target="_blank" href="<?php echo esc_url('https://codethemes.co/wp-content/uploads/2016/11/Resortica-lite-Documentation.pdf'); ?>"><span class="dashicons dashicons-book-alt"></span><?php echo  __('Documentation', 'resortica-lite') ?></a>


              <a class="resortica-lite-support" target="_blank" href="<?php echo  esc_url('https://codethemes.co/my-tickets/') ?>"><span class="dashicons dashicons-edit"></span><?php echo   __('Create a Ticket', 'resortica-lite') ?></a>

              <a class="resortica-lite-support" target="_blank" href="<?php echo esc_url('https://themeforest.net/item/resortica-responsive-wordpress-theme-for-hotels-resorts/20226373?ref=code_themes'); ?>"><span class="dashicons dashicons-star-filled"></span><?php echo   __('Buy Premium', 'resortica-lite') ?></a>

              <a class="resortica-lite-support" target="_blank" href="<?php echo  esc_url('http://preview.themeforest.net/item/resortica-responsive-wordpress-theme-for-hotels-resorts/full_screen_preview/20226373?_ga=2.130461775.1158084183.1503633177-782439093.1496376444&ref=code_themes') ?>"><span class="dashicons dashicons-book-alt"></span> <?php echo __('Demo Link', 'resortica-lite'); ?></a>

              <a class="support-image resortica-lite-support" target="_blank" href="<?php echo  esc_url('https://codethemes.co/support/#customization_support') ?>"><img src = "<?php echo esc_url(get_template_directory_uri() . '/assets/img/wparmy.png') ?>" /> <?php echo __('Request Customization', 'resortica-lite'); ?></a>
            </p>
         <?php
      }
}
