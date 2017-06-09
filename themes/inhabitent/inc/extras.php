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
function inhabitent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'inhabitent_body_classes' );

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
    return home_url('/');
}
add_filter( 'login_headerurl', 'the_url' );

function inhabitent_login_title() {
	return 'Inhabitent';
}
add_filter('login_headertitle', 'inhabitent_login_title');

// Change page name ---------------------------------//

 function inhabitent_change_archive_titles( $title ) {
     if( is_post_type_archive( 'product' ) ) {
         $title = 'Shop Stuff';
     } if( is_post_type_archive( 'adventure' ) ) {
         $title = 'Latest Adventures';
     } elseif( is_tax( 'product-type' )) {
				$title = single_term_title('', false);
		 }
     return $title;
 };

  add_filter( 'get_the_archive_title', 'inhabitent_change_archive_titles');
 
 function change_archive_posts($query) {
 	if ( (is_post_type_archive( 'product' ) ) || is_tax( 'product-type'))  {
      $query->set( 'posts_per_page', 16 );
 	    $query->set( 'orderby', 'title' );
      $query->set( 'order', 'ASC' );
     return;
   }
 }
 
add_action( 'pre_get_posts', 'change_archive_posts'); 


/**
 * Customize excerpt length and style.
 *
 * @param  string The raw post content.
 * @return string
 */
function red_wp_trim_excerpt( $text ) {
	$raw_excerpt = $text;
	
	if ( '' == $text ) {
		// retrieve the post content
		$text = get_the_content('');
		
		// delete all shortcode tags from the content
		$text = strip_shortcodes( $text );
		
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );
		
		// indicate allowable tags
		$allowed_tags = '<p>,<a>,<em>,<strong>,<blockquote>,<cite>';
		$text = strip_tags( $text, $allowed_tags );
		
		// change to desired word count
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters( 'excerpt_length', $excerpt_word_count );
		
		// create a custom "more" link
		$excerpt_end = '<span>[...]</span><p><a href="' . get_permalink() . '" class="read-more">Read more &rarr;</a></p>'; // modify excerpt ending
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end );
		
		// add the elipsis and link to the end if the word count is longer than the excerpt
		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
		
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}
	}
	
	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'red_wp_trim_excerpt' );


function inhabitent_about_hero () {
	if ( ! is_page_template( 'page-about.php' ) ) {
		return;
	}
	
	$hero = CFS()->get( 'hero_image' );		
	$hero_background = "
		.about-hero {
			background: url($hero) bottom/cover no-repeat;
			height: 101vh;
		}";

	wp_add_inline_style( 'inhabitent-style', $hero_background );
}

add_action ( 'wp_enqueue_scripts', 'inhabitent_about_hero' );