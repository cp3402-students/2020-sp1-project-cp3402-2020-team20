<?php
/**
 * Group20 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Group20
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'group20_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function group20_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Group20, use a find and replace
		 * to change 'group20' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'group20', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'group20' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'group20_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'group20_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function group20_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'group20_content_width', 640 );
}
add_action( 'after_setup_theme', 'group20_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function group20_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'group20' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'group20' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'group20_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function group20_scripts() {

    wp_enqueue_style( 'group20-fonts', "https://fonts.googleapis.com/css2?family=Poiret+One&display=swap");
	wp_enqueue_style( 'group20-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'group20-style', 'rtl', 'replace' );
	wp_enqueue_script( 'group20-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'group20-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'group20_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//
// 
// Custom Functions
// 
//

function group20_custom_scripts() {     
	wp_enqueue_script( 'hamburger-menu-script', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array( 'jquery' ) );
}

// Custom image slider 
function add_images_to_slider($wp_customize) {
	$wp_customize->add_section('slider_images', array(
		'title' => 'Image Slider',
		'description' => 'Add some images to the image slider.',
		'capability' => 'edit_theme_options'
	));

	// Image 1
	$wp_customize->add_setting('images', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'images', array(
		'section' => 'slider_images',
		'label' => 'Images',
		'mime_type' => 'image',
		'description' => 'This will add images to the image slider.'
	)));

	// Image 2
	$wp_customize->add_setting('images2', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'images2', array(
		'section' => 'slider_images',
		'label' => 'Images2',
		'mime_type' => 'image',
		'description' => 'This will add images to the image slider.'
	)));

	// Image 3
	$wp_customize->add_setting('images3', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'images3', array(
		'section' => 'slider_images',
		'label' => 'Images3',
		'mime_type' => 'image',
		'description' => 'This will add images to the image slider.'
	)));
}

add_action('customize_register', 'add_images_to_slider');

// test looper

function echo_theme_slider_images() {
	$images = ['images', 'images2', 'images3'];

	for ($i = 0; $i < 3; $i++) {
		$id = get_theme_mod($images[$i]);
		if ($id != 0) {
			// Display nothing
		}
		$attr = array(
			'src' => wp_get_attachment_url($id)
		);
		
		echo image_shortcode($attr);
		};
}

// Add Image Shortcode
function image_shortcode($atts) {
    $atts = shortcode_atts(
        [
        'src' => '',
        ], $atts, 'img'
    );

    $return = '<div class="mySlides fade"><img src="' . $atts['src'] . '"/></div>';
    
    return $return;
}

add_shortcode('img', 'image_shortcode');





// // new section from https://www.sitepoint.com/using-the-wordpress-customizer-media-controls/ tutorial

function add_my_media_controls($wp_customize) {
	$wp_customize->add_section('sound', array(
		'title' => 'Music',
		'description' => 'Add some music to play in the background of your website.',
		'capability' => 'edit_theme_options'
	));

	$wp_customize->add_setting('music', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'music', array(
		'section' => 'sound',
		'label' => 'Music',
		'mime_type' => 'audio',
		'description' => 'This will add music to the music player.'
	)));

}

// this is the function to actually put the media player on the page
function echo_theme_sound() {
	$id = get_theme_mod('music');
	if ($id != 0) {
		// Display the tag
	}
	$attr = array(
		'src' => wp_get_attachment_url($id)
	);
	
	echo '<div style="margin-top: 30px;">' . wp_audio_shortcode($attr) . '</div>';
}


add_action('customize_register', 'add_my_media_controls');




add_action( 'wp_enqueue_scripts', 'group20_custom_scripts' );