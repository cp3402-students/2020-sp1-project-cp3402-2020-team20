<?php

/**
 * Group20 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Group20
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('group20_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function group20_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Group20, use a find and replace
		 * to change 'group20' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('group20', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'group20'),
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
		add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'group20_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function group20_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('group20_content_width', 640);
}
add_action('after_setup_theme', 'group20_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function group20_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'group20'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'group20'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'group20_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function group20_scripts()
{

	wp_enqueue_style('group20-fonts', 'https://use.typekit.net/laz8fep.css');
	wp_enqueue_style('group20-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('group20-style', 'rtl', 'replace');
	wp_enqueue_script('group20-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('group20-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'group20_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


//
// 
// Custom Functions
// 
//

function group20_custom_scripts()
{
	wp_enqueue_script('hamburger-menu-script', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array('jquery'));
}

// image slider customizer code
function add_images_to_slider($wp_customize)
{
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

function echo_theme_slider_images()
{
	$images = ['images', 'images2', 'images3'];

	for ($i = 0; $i < 3; $i++) {

		if (get_theme_mod($images[$i]) != 0) {
			$id = get_theme_mod($images[$i]);
			if ($id != 0) {
				// Display nothing
			}
			$attr = array(
				'src' => wp_get_attachment_url($id)
			);
			echo image_shortcode($attr);
		}
	};
}

// image shortcode
function image_shortcode($atts)
{
	$atts = shortcode_atts(
		[
			'src' => '',
		],
		$atts,
		'img'
	);

	$return = '<div class="mySlides fade"><img src="' . $atts['src'] . '"/></div>';

	return $return;
}
add_shortcode('img', 'image_shortcode');

// add music player customizer option

function add_my_media_controls($wp_customize)
{
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
function echo_theme_sound()
{
	$id = get_theme_mod('music');
	if ($id != 0) {
		// Display the tag
	}
	$attr = array(
		'src' => wp_get_attachment_url($id)
	);

	echo '<div id="music_player" class="music-player"' . wp_audio_shortcode($attr) . '</div>';
}

// customizer option - turn on/off display of bylines of posts

function add_post_meta_checkbox($wp_customize)
{
	$wp_customize->add_section('byline', array(
		'title' => 'Post Meta Information',
		'description' => 'Choose whether or not to display meta information about posts.',
		'capability' => 'edit_theme_options'
	));

	$wp_customize->add_setting('meta_info', array(
		'default' => true,
		'capability' => 'edit_theme_options'
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'meta_info', array(
		'section' => 'byline',
		'label' => 'Post meta info',
		'description' => 'This allows the user to choose if they want the meta information displayed with a post.',
		'type' => 'checkbox'
	)));
}

	function register_my_menu()
	{
		register_nav_menu('footer-menu', __('Footer menu'));
	}
	add_action('init', 'register_my_menu');


	// Custom image slider Footer
	function add_images_to_footer($wp_customize)
	{
		$wp_customize->add_section('slider_images_footer', array(
			'title' => 'Image Footer',
			'description' => 'Add some images to the image slider.',
			'capability' => 'edit_theme_options'
		));

		// Image 1
		$wp_customize->add_setting('footer_images', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		));

		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_images', array(
			'section' => 'slider_images_footer',
			'label' => 'Images',
			'mime_type' => 'image',
			'description' => 'This will add images to the image slider.'
		)));

		// Image 2
		$wp_customize->add_setting('footer_images2', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		));

		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_images2', array(
			'section' => 'slider_images_footer',
			'label' => 'Images2',
			'mime_type' => 'image',
			'description' => 'This will add images to the image slider.'
		)));

		// Image 3
		$wp_customize->add_setting('footer_images3', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		));

		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_images3', array(
			'section' => 'slider_images_footer',
			'label' => 'Images3',
			'mime_type' => 'image',
			'description' => 'This will add images to the image slider.'
		)));
	}

	function echo_post_meta()
	{
		$display_meta = get_theme_mod('meta_info', true);

		if ($display_meta == true) {
			group20_posted_on();
			group20_posted_by();
		}
	}


// test looper
function echo_theme_footer_images()
{
	$footer_images = ['footer_images', 'footer_images2', 'footer_images3'];


	for ($x = 0; $x < 3; $x++) {
		$id = get_theme_mod($footer_images[$x]);
		if ($id != 0) {
			// Display nothing
		}
		$attr = array(
			'src' => wp_get_attachment_url($id)
		);

		echo image_shortcode_footer($attr);
	};
}

// Add Image Shortcode
function image_shortcode_footer($atts)
{
	$atts = shortcode_atts(
		[
			'src' => '',
		],
		$atts,
		'img'
	);

	$return = '<div class="footer_images_column"><img src="' . $atts['src'] . ' "style="width:100%"/></div>';

	return $return;
}

add_shortcode('img', 'image_shortcode_footer');

add_action('customize_register', 'add_post_meta_checkbox');
add_action('customize_register', 'add_my_media_controls');
add_action('wp_enqueue_scripts', 'group20_custom_scripts');
add_action('customize_register', 'add_images_to_slider');
add_action('customize_register', 'add_images_to_footer');


function footer_blurb( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'text_blocks', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Footer Text Blurb', 'footer_blurb_txt' ),
		'description'    => __( 'Set text blurb for footer.', 'footer_blurb_txt' ),
	) );
	// Add Footer Text
	// Add section.
	$wp_customize->add_section( 'custom_footer_text' , array(
		'title'    => __('Change Footer Text','footer_blurb_txt'),
		'panel'    => 'text_blocks',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'footer_text_block', array(
		 'default'           => __( 'default text', 'footer_blurb_txt' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_footer_text',
		    array(
		        'label'    => __( 'Footer Text', 'footer_blurb_txt' ),
		        'section'  => 'custom_footer_text',
		        'settings' => 'footer_text_block',
		        'type'     => 'text'
		    )
	    )
	);


 	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
}
add_action( 'customize_register', 'footer_blurb' );

function echo_theme_footer_blurb()
{
	echo '<div>' . get_theme_mod( 'footer_text_block') . '</div>';
}

function color_customizer($wp_customize){
  $wp_customize->add_section( 'theme_colors_settings', array(
      'title' => __( 'Theme Colors Settings', 'Group20Theme' ),
      'priority' => 5,
    ) );

    $theme_colors = array();

    $theme_colors[] = array(
      'slug'=>'color_PrimaryTitle',
      'default' => '#F7A525',
      'label' => __('Primary Title', 'Group20Theme')
    );
	
	$theme_colors[] = array(
      'slug'=>'color_PrimaryTitle_Highlight',
      'default' => '#f7e2c0',
      'label' => __('Primary Title Highlight', 'Group20Theme')
    );
	
	$theme_colors[] = array(
	  'slug'=>'color_PrimaryTitle_Font', 
	  'default' => '#FFF8DD',
	  'label' => __('PrimaryTitle Font', 'Group20Theme')
	);
	
	$theme_colors[] = array(
	  'slug'=>'color_MainBackground', 
	  'default' => '#151617',
	  'label' => __('Main Background', 'Group20Theme')
	);
	
	$theme_colors[] = array(
	  'slug'=>'color_Main_Font', 
	  'default' => '#3a290c',
	  'label' => __('Main Font', 'Group20Theme')
	);
	
	$theme_colors[] = array(
	  'slug'=>'color_Secondary', 
	  'default' => '#fff0e5',
	  'label' => __('Secondary', 'Group20Theme')
	);
	
	$theme_colors[] = array(
	  'slug'=>'color_Secondary_Font', 
	  'default' => '#515151',
	  'label' => __('Secondary Font', 'Group20Theme')
	);

    foreach( $theme_colors as $color ) {

      $wp_customize->add_setting(
        $color['slug'], array(
          'default' => $color['default'],
          'sanitize_callback' => 'sanitize_hex_color',
          'type' => 'option',
          'capability' => 'edit_theme_options'
        )
      );

      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          $color['slug'],
          array('label' => $color['label'],
          'section' => 'theme_colors_settings',
          'settings' => $color['slug'])
        )
      );
    }
  }
add_action( 'customize_register', 'color_customizer' );

