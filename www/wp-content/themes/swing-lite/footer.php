<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swing
 */
?>

	</div><!-- #content -->

		<?php 
			/* before main footer */
			do_action('swing_lite_footer_before');

			/* main footer */
			do_action('swing_lite_footer_contents');

			/* after main  footer */
			do_action('swing_lite_footer_after');
		?>
		
		<a href="#" class="scrollup"><i class="fa fa-angle-double-up" aria-hidden="true"></i> </a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>