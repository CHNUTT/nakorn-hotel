
<header id="masthead" class="site-header over-slider-header">  
      <div class="topheader">
        <div class="container-wrap s-container clear">
          

          <div class="logo-wrap">
            <div class="logo">
              <?php
                if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                  the_custom_logo();
                }
              ?>
            </div>

            <?php if ( !has_custom_logo() )  { ?>
              <div class="logo-textwrap">
                <h1 class="site-title">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                  </a>
                </h1>
                <?php 
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) { ?>
                    <p class="site-description"><?php echo esc_html($description);?></p>
                <?php } ?>
              </div>
            <?php } ?>

          </div>

          <div class="swing-nav">
            <button id="toggle" class="btn-transparent-toggle toggle">
               <div class="one"></div>
               <div class="two"></div>
               <div class="three"></div>
            </button>
            <div class="nav ">
              <div class="clear">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
              </div>
            </div>
          </div>

        </div>
      </div>  
    </header>