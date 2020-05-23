<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package Group20
 */

?>

	<footer id="colophon" class="site-footer" style="
			color: <?php echo get_option('color_Secondary_Font'); ?>;
			background-color: <?php echo get_option('color_Secondary'); ?>;">

		<div class="site-info">

			<div>
				<?php echo get_theme_mod( 'footer_text_block')?>
			</div>
			<div>
				<?php $socialimage = wp_get_attachment_image_src(get_theme_mod( 'footer_social_image'));?>
				<a href="<?php echo get_theme_mod( 'footer_social_link')?>"><img src="<?php echo $socialimage[0];?>" style="width:64px; height:64px;"></a><br>
			</div>

			<div class="footer_images_row">
				<?php echo_theme_footer_images(); ?>
			</div>
			
			<span class="sep"> </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'group20' ), 'group20', '<a href="http://underscores.me/">Group20</a>' );
				?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
