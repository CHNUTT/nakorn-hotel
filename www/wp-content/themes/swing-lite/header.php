<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swing
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>   
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}?>
     <!-- Pre loader section -->
	<?php do_action('swing_lite_preloader'); ?>
<div id="page" class="site">

		<?php 
			/* before main header */
			do_action('swing_lite_header_before');
			/* main header */
			do_action('swing_lite_main_header');
		?>

	<div id="content" class="site-content">
	<?php
		$page_template = get_page_template();

		if (!is_front_page()) {
	?>
		<div class="breadcrumb">
			<div class="s-container">
			 <div class="overlay"></div>
				<?php
					if( is_home() && is_front_page() ) {
						return;
					}

					if(class_exists('WooCommerce') && is_woocommerce()) {
                        echo '<div class="swing-breadcrumb">';
                            swing_lite_woo_breadcrumb();
                        echo '</div>';
						
					} else {
						require_once get_template_directory() . '/inc/breadcrumbs.php';

						echo '<div class="swing-breadcrumb">';
							swing_lite_breadcrumb_trail();
						echo '</div>';
					}
				?>
					<div class="breadcrumb-title">

						<?php if(is_archive()) : ?>
							<?php the_archive_title( '<h1 class="header-page-title">', '</h1>' ); ?>
						<?php elseif( is_home()) : ?>
							 <h1 class="header-page-title"><?php single_post_title(); ?></h1>			
						<?php elseif(is_singular()) : ?>
							<h1 class="header-page-title"><?php single_post_title(); ?></h1>
						<?php elseif(is_front_page()) : ?>
							<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>
						<?php elseif(is_404()) : ?>
							<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>
						<?php elseif(is_category()) : ?>
							<?php the_archive_title( '<h1 class="header-page-title">', '</h1>' ); ?>
						<?php elseif(is_search()) : ?>
							<h1 class="header-page-title">
								<?php
									/* translators: %s : search keyword */
									printf( esc_html__( 'Search Results for: %s', 'swing-lite' ), get_search_query() );
								?>
							</h1>
						<?php elseif(is_page()) : ?>
							<?php the_title( '<h1 class="header-page-title">', '</h1>' ); ?>
						<?php endif; ?>

					</div>
			</div>
		</div>

<?php }