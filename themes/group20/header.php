<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Group20
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'group20' ); ?></a>

	<div class="top-header">
		<header id="masthead" class="site-header">
		
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$group20_description = get_bloginfo( 'description', 'display' );
			if ( $group20_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $group20_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<!-- Slideshow container -->
<div class="slideshow-container">

<!-- OBVIOUSLY COME BACK AND CHANGE THIS -->
	<div class="mySlides fade">
	<img src="<?php echo get_theme_file_uri('inc\wp001b8c5d_05_06.jpg'); ?>" />
	<div class="text">PICTURE ONE</div>
	</div>

	<div class="mySlides fade">
	<img src="<?php echo get_theme_file_uri('inc\wp1b62ae80_05_06.jpg'); ?>" />
	<div class="text">PICTURE TWO</div>
	</div>
	
</div>

		<div id="nav-icon1">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div> <!-- #top-header -->

	<div class="main-nav-part">		
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div><!-- #main-nav-part -->


	<?php echo_theme_slider_images() ?>
	<?php echo_theme_sound() ?>

	</header><!-- #masthead -->
