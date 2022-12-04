<?php
/**
 * dreambody functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dreambody
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dreambody_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dreambody, use a find and replace
		* to change 'dreambody' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dreambody', get_template_directory() . '/languages' );

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
			'header_menu' => esc_html__( 'Header menu', 'dreambody' ),
			'services_menu' => esc_html__( 'Services menu', 'dreambody' ),
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
			'dreambody_custom_background_args',
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
			'height'      => 75,
			'width'       => 120,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dreambody_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dreambody_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dreambody_content_width', 640 );
}
add_action( 'after_setup_theme', 'dreambody_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dreambody_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Left', 'dreambody' ),
			'id'            => 'sidebar-footer1',
			'description'   => esc_html__( 'Add widgets here.', 'dreambody' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-3 col-sm-6 order-lg-1 order-2 contacts-block">',
			'after_widget'  => '</div>',
			'before_title'  => '<p>','<b>',
			'after_title'   => '<b>','</p>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Center', 'dreambody' ),
			'id'            => 'sidebar-footer2',
			'description'   => esc_html__( 'Add widgets here.', 'dreambody' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-4 col-sm-12 order-lg-3 order-1 contacts-block">',
			'after_widget'  => '</div>',
			'before_title'  => '<p>','<b>',
			'after_title'   => '<b>','</p>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Right', 'dreambody' ),
			'id'            => 'sidebar-footer3',
			'description'   => esc_html__( 'Add widgets here.', 'dreambody' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-3 order-lg-5 col-sm-6 order-3 contacts-block">',
			'after_widget'  => '</div>',
			'before_title'  => '<p>','<b>',
			'after_title'   => '<b>','</p>',
		)
	);
}
add_action( 'widgets_init', 'dreambody_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dreambody_scripts() {
	/*wp_enqueue_style( 'dreambody-style', get_stylesheet_uri(), array(), _S_VERSION );*/
	wp_enqueue_style( 'dreambody-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'baguette','https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'dreambody-index-css', get_template_directory_uri().'/src/css/index.css');
	/*wp_style_add_data( 'dreambody-style', 'rtl', 'replace' );*/

	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('maskedinput', 'https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js', array(), '', true);
	wp_enqueue_script('simple-adaptive-slider', get_template_directory_uri() . '/src/js/simple-adaptive-slider.min.js', '', true);
	wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/714da3a7ba.js', array(), '', true);
	wp_enqueue_script('dreambody-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', array(), '', true);
	wp_enqueue_script('baguette-js', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js', array(), '', true);
	wp_enqueue_script('dreambody-js', get_template_directory_uri() . '/src/js/my.js', array(), '', true);
	/*wp_enqueue_script( 'dreambody-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );*/

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dreambody_scripts' );

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


//Custom code
function dreambody_get_background($field, $cat=null, $cover=true){
	if(get_field($field, $cat)){
		$add_style = $cover ? 'background-size: cover' : '';
		return ' style="background: url(' . get_field($field, $cat). '); '.$add_style.'"';
	}
	return null;
}


require_once('crest/crest.php');
$result = CRest::call(
    'crm.lead.list',
    [
        'filter' => [
            '>=DATE_CREATE' => '2022-12-01T00:00:00'
        ],
        'select' => [
            'TITLE',
            'NAME',
            'PHONE',
			'DATE_CREATE'
        ]
    ]
);
$lides = $result['result'];

function phone_format($phone) {
	$phone = trim($phone);
	$res = preg_replace('/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/','+7 ($2) $3-$4-$5', $phone);
	return $res;
}
	

