<?php
/**
 * inhabitent Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inhabitent_Theme
 */

if ( ! function_exists( 'inhabitent_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function inhabitent_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // inhabitent_setup
add_action( 'after_setup_theme', 'inhabitent_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function inhabitent_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inhabitent_content_width', 640 );
}
add_action( 'after_setup_theme', 'inhabitent_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inhabitent_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => 'Main sidebar area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'inhabitent_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function inhabitent_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'inhabitent_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function inhabitent_scripts() {
	wp_enqueue_style( 'inhabitent-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'font-awesome-cdn', 'https://use.fontawesome.com/7f442c52d1.js', array(), '4.7.0');

	wp_enqueue_script( 'inhabitent-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'inhabitent-search-bar-toggle', get_template_directory_uri() . '/build/js/search-form.min.js', array('jquery'), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page( 'home' ) || is_page( 'about' ) || is_singular ( 'adventure' ) ) {
		wp_enqueue_script( 'inhabitent-nav-bar-toggle', get_template_directory_uri() . '/build/js/header-bar.min.js', array('jquery'), false, true );
	} else {
		return;
	}
}
add_action( 'wp_enqueue_scripts', 'inhabitent_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

// custom logo

add_theme_support( 'custom-logo' );

function inhabitent_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'inhabitent' );

if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
}

$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if ( has_custom_logo() ) {
        echo '<img src="/images/inhabitent-logo-tent-white.svg'. esc_url( $logo[0] ) .'">';
} 

