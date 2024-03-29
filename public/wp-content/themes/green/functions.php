<?php


if ( ! function_exists( 'green_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function green_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on green, use a find and replace
		 * to change 'green' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'green', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'green' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'green_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'green_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function green_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'green_content_width', 640 );
}
add_action( 'after_setup_theme', 'green_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function green_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'green' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'green' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'green_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function green_scripts() {

	wp_enqueue_style(
		'green-bootstrap',
		get_template_directory_uri() . '/css/bootstrap.min.css'
	);

	wp_enqueue_style(
		'green-animate',
		get_template_directory_uri() . '/css/animate.min.css'
	);

	wp_enqueue_style(
		'green-carousel',
		get_template_directory_uri() . '/css/carousel.css'
	);

	wp_enqueue_style(
		'green-font-awesome',
		get_template_directory_uri() . '/css/font-awesome.min.css'
	);

	wp_enqueue_style(
		'green-font-awesome',
		get_template_directory_uri() . '/css/font-awesome.min.css'
	);

	wp_enqueue_style(
		'green-google-fonts',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800'
	);

	wp_enqueue_style(
		'green-mystyle',
		get_stylesheet_uri()
	);

	wp_enqueue_style(
		'green-isotope',
		get_template_directory_uri() . '/css/isotope/style.css'
	);


	wp_enqueue_script(
		'waypoints',
		get_template_directory_uri() . '/js/waypoints.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'counterup',
		get_template_directory_uri() . '/js/jquery.counterup.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'gmaps',
		get_template_directory_uri() . '/js/gmaps.min.js',
		array(''), '', true
	);

	wp_enqueue_script(
		'googleapis',
		'https://maps.googleapis.com/maps/api/js?key=AIzaSyBjxvF9oTfcziZWw--3phPVx1ztAsyhXL4'
	);

	wp_enqueue_script(
		'isotope_scripts_min',
		get_template_directory_uri() . '/js/isotope/min/scripts-min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'isotope_cells',
		get_template_directory_uri() . '/js/isotope/cells-by-row.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'isotope_pkgd',
		get_template_directory_uri() . '/js/isotope/isotope.pkgd.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'isotope_packery',
		get_template_directory_uri() . '/js/isotope/packery-mode.pkgd.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'isotope_scripts',
		get_template_directory_uri() . '/js/isotope/scripts.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'backtotop',
		get_template_directory_uri() . '/js/backtotop.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'localScroll',
		get_template_directory_uri() . '/js/jquery.localScroll.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'scrollTo',
		get_template_directory_uri() . '/js/jquery.scrollTo.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'wow',
		get_template_directory_uri() . '/js/wow.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'bootstrap',
		get_template_directory_uri() . '/js/bootstrap.min.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/js/main.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array('jquery'), '', true
	);

	wp_enqueue_script(
		'customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array('jquery'), '', true
	);


	wp_enqueue_script( 'green-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'green_scripts' );

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

add_theme_support('post_thumbnails');

add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
	register_nav_menus( array(
		'primary' => __ ('Primary Menu', 'green'),
	));
}
