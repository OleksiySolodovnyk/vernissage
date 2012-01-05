<?php

if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run vernissage_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'vernissage_setup' );

if ( ! function_exists( 'vernissage_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override vernissage_setup() in a child theme, add your own vernissage_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Eleven 1.0
 */
function vernissage_setup() {

	/* Make Twenty Eleven available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Eleven, use a find and replace
	 * to change 'vernissage' to the name of your theme in all the template files.
	 */
    
    
	//load_theme_textdomain( 'vernissage', TEMPLATEPATH . '/languages' );

        /*
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
        */

    
    
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'vernissage' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// Add support for custom backgrounds
	add_custom_background();

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// Add custom image sizes
	   
        set_post_thumbnail_size(277, 130,  true);
        add_image_size('medium-feature', 457, 381, true);
        add_image_size('thumbnail-feature', 277, 130, true);
        add_image_size('restaurant', 695, 411, true);
        //add_image_size('large', 800, 600, true);

	
}
endif; // vernissage_setup






/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function vernissage_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'vernissage_excerpt_length' );




if ( ! function_exists( 'vernissage_posted_on' ) ) :
function vernissage_posted_on() {
	printf('<time class="entry-date" datetime="%1$s" pubdate>%2$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
endif;



/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function vernissage_page_menu_args( $args ) {
	$args['show_home'] = false;
	return $args;
}
add_filter( 'wp_page_menu_args', 'vernissage_page_menu_args' );



/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Twenty Eleven 1.0
 */
function vernissage_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Menu', 'vernissage' ),
		'id' => 'sidebar-1',
	) );
}
add_action( 'widgets_init', 'vernissage_widgets_init' );







/* Enable HR Button for TinyMCE */

function enable_more_buttons($buttons) {
  $buttons[] = 'hr';
 
  /* 
  Repeat with any other buttons you want to add, e.g.
	  $buttons[] = 'fontselect';
	  $buttons[] = 'sup';
  */
 
  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");



/* Modify ballon of pronamic google maps*/

function prefix_pgmm_item($itemContent) {
	$itemContent = '';
	$itemContent .= '<a class="title" href="'. get_permalink() .'">';
	$itemContent .= 	get_the_title();
	$itemContent .= '</a>';
	$itemContent .= '<br />';
	$itemContent .= '<span class="address">' . get_post_meta(get_the_id(), Pronamic_Google_Maps_Post::META_KEY_ADDRESS, true) . "</span>";
	return $itemContent;
}

add_filter('pronamic_google_maps_mashup_item', 'prefix_pgmm_item');
