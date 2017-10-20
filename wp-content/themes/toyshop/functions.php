<?php
/**
 * Starter functions and definitions
 *
 * @package Starter
 */

if ( ! function_exists( 'starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Starter, use a find and replace
	 * to change 'starter' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'starter', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'starter' ),
		'footer' => esc_html__( 'Footer Menu', 'starter' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // starter_setup
add_action( 'after_setup_theme', 'starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function starter_widgets_init() {
	register_sidebar( array(
			'name'          => esc_html__( 'Top bar Woo', 'starter' ),
			'id'            => 'top-bar-woo',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) );
	register_sidebar( array(
			'name'          => esc_html__( 'Top bar Cart', 'starter' ),
			'id'            => 'top-bar-woo-2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Left sidebar', 'starter' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
			'name'          => esc_html__( 'Home Right Sidebar', 'starter' ),
			'id'            => 'home-sidebar',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'starter' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'starter' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'starter' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'starter' ),
			'id'            => 'footer-4',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) )
	;register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'starter' ),
			'id'            => 'shop-sidebar',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
	) );






}
add_action( 'widgets_init', 'starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function starter_scripts() {
	wp_enqueue_style( 'starter-style', get_stylesheet_uri() );
	wp_enqueue_style( 'starter-grid', get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'starter-icons', get_stylesheet_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style( 'reset-css', get_stylesheet_directory_uri().'/css/reset.css' );
	wp_enqueue_style( 'theme-css', get_stylesheet_directory_uri().'/css/theme.css' );
	wp_enqueue_style( 'lf-css', get_stylesheet_directory_uri().'/css/lf.css' );
	wp_enqueue_style( 'stepper', get_stylesheet_directory_uri().'/css/jquery.fs.stepper.css' );
	wp_enqueue_style( 'select', get_stylesheet_directory_uri().'/css/select2.min.css' );
	wp_enqueue_script( 'starter-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'starter-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'boostrapmin-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'starter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'stepper', get_template_directory_uri() . '/js/jquery.fs.stepper.min.js', array(), '20130115', true );
	wp_enqueue_script( 'select', get_template_directory_uri() . '/js/select2.min.js', array(), '20130115', true );
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});
function customizer_css() {
	get_template_part( '/inc/customizer_css' );
}
add_action( 'wp_head', 'customizer_css', '100' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Helper Functions
 */
require get_template_directory() . '/inc/theme_functions.php';


//require get_template_directory() . '/inc/upload_page.php';
/**
 * Load Helper Functions
 */

/**
 * Include slick
 */
require get_template_directory() . '/inc/slick/slick.php';



if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(
		array(
				'page_title' 	=> 'Theme Settings',
				'menu_title'	=> 'Theme Settings',)
	);

}

/*
 * Wp-Login Logo Change
 * */
function my_login_logo() { ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(<?php echo( get_header_image() ); ?>);
			padding-bottom: 30px;
		}
		#login h1 a, .login h1 a { width:129px !important; height:108px !important; background-size: 129px 108px !important;}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

add_filter('upload_mimes', 'custom_upload_xml');

function custom_upload_xml($mimes) {
	$mimes = array_merge($mimes, array('xml' => 'application/xml'));
	$mimes = array_merge($mimes, array('svg' => 'image/svg+xml'));
	return $mimes;
}

function fix_svg_thumb_display() {
	echo '
	<style>
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
      width: 100% !important;
      height: auto !important;
    }
  </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		$return_number = 4;

		if( is_front_page() ){
			$return_number = 3;
		}
		return $return_number; // 3 products per row
	}
}
add_filter('woocommerce_product_add_to_cart_text', 'wh_archive_custom_cart_button_text');   // 2.1 +

function wh_archive_custom_cart_button_text()
{
	return '<i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart';
}
function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyBQilzeY4HHSm9_2Gfml01G5D8shVjelAQ');
}

add_action('acf/init', 'my_acf_init');
add_filter('body_class', 'custom_body_class');
function custom_body_class($classes) {
	if (is_page(1805))
		$classes[] = 'woocommerce woocommerce-page archive';
	return $classes;
}
