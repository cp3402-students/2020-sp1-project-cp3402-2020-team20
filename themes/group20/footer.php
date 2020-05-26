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
        background-color: <?php get_custom_background_color(); ?>;">

    <div class="site-info">

        <div>
            <?php echo_theme_footer_blurb(); ?>
        </div>

        <div class="footer_images_row">
            <?php echo_theme_footer_images(); ?>
        </div>

        <span class="sep"> </span>
        <?php
        /* translators: 1: Theme name, 2: Theme author. */
        printf(esc_html__('Theme: %1$s by %2$s.', 'group20'), 'group20', '<a href="http://underscores.me/">Group20</a>');
        ?>

    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
