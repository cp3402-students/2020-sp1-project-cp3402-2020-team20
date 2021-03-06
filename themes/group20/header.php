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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="
        background-color: <?php get_custom_background_color(); ?>;">
<?php wp_body_open(); ?>
<div id="page" class="site"
     style="background-color: <?php get_custom_background_color() ?>;">

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'group20'); ?></a>

    <div class="top-header">
        <header id="masthead" class="site-header">

            <div class="site-branding">
                <?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                              rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                             rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;
                $group20_description = get_bloginfo('description', 'display');
                if ($group20_description || is_customize_preview()) :
                    ?>
                    <p class="site-description"><?php echo $group20_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- OBVIOUSLY COME BACK AND CHANGE THIS -->
                <?php echo_theme_slider_images() ?>

            </div>
            <div id="nav-icon1">
                <span></span>
                <span></span>
                <span></span>
            </div>
    </div> <!-- #top-header -->

    <div class="main-nav-part">
        <nav id="site-navigation" class="main-navigation" style="
                background-color: <?php echo get_custom_background_color(); ?>;">

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
        <div id="music-padding">
            <?php

            echo_theme_sound();
            if (get_call_to_action_link()) {
                // here
                echo '<script type="text/javascript">', 'ctafunction();', '</script>';
            }

            ?>

        </div>
    </div>


    </header><!-- #masthead -->
</div><!-- #main-nav-part -->
