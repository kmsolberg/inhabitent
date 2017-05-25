<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

// Remove "Editor" links from sub-menus
function inhabitent_remove_submenus() {
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'inhabitent_remove_submenus', 110 );

// custom login for theme
function my_custom_login_logo() {
     echo '<style type="text/css">                                                                   
         h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/inhabitent-logo-text-dark.svg) !important; 
         background-size: contain !important; width: auto !important;}                            
     </style>';
}
add_action('login_head', 'my_custom_login_logo');

function the_url( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );

function inhabitent_login_title() {
	return 'Inhabitent';
}
add_filter('login_headertitle', 'inhabitent_login_title');

add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_post_type_archive() ) {
        $title = 'Shop Stuff';
    }
    return $title;
});

function change_archive_posts($query) {
	if ( is_post_type_archive( 'product' ) ) {
        $query->set( 'posts_per_page', 16 );
	    $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    return;
  }
}

add_action( 'pre_get_posts', 'change_archive_posts');