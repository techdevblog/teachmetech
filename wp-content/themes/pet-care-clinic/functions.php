<?php
/**
 * Pet Care Clinic functions
 *
 * @package Pet Care Clinic
 */

function pet_care_clinic_contwidth(){
    if (!isset($content_width)) {
        $content_width = 730; /* pixels */
    }
}
add_action( 'after_setup_theme', 'pet_care_clinic_contwidth');

if (!function_exists('pet_care_clinic_setup')) :

    function pet_care_clinic_setup() {

        add_theme_support('woocommerce');

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on pet-care-clinic, use a find and replace
         * to change pet-care-clinic to the name of your theme in all the template files
         */
        load_theme_textdomain('pet-care-clinic', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');        
        add_theme_support( 'align-wide' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'pet-care-clinic'),
            'footer-links' => esc_html__('Footer Links', 'pet-care-clinic') // secondary menu in footer
        ));

        // Enable support for Post Formats.
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('pet_care_clinic_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
        add_theme_support('custom-header');
    }

endif; // pet_care_clinic_setup
add_action('after_setup_theme', 'pet_care_clinic_setup');

function pet_care_clinic_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'pet_care_clinic_theme_add_editor_styles' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pet_care_clinic_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'pet_care_clinic_pingback_header' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function pet_care_clinic_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'pet-care-clinic'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'contact-widget',
        'name' => __('Contact Widget', 'pet-care-clinic'),
        'description' => __('Displays on the Home Page', 'pet-care-clinic'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-1',
        'name' => __('Footer Widget 1', 'pet-care-clinic'),
        'description' => __('Used for footer widget area', 'pet-care-clinic'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-2',
        'name' => __('Footer Widget 2', 'pet-care-clinic'),
        'description' => __('Used for footer widget area', 'pet-care-clinic'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-3',
        'name' => __('Footer Widget 3', 'pet-care-clinic'),
        'description' => __('Used for footer widget area', 'pet-care-clinic'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'pet_care_clinic_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function pet_care_clinic_enq_styles() {
    wp_enqueue_style('pet-care-clinic-font', pet_care_clinic_font_family(), array() );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/inc/css/fontawesome-all.css');
    wp_enqueue_style('nivo', get_template_directory_uri() . '/inc/css/nivo-slider.css');
    wp_enqueue_style('pet-care-clinic-style', get_stylesheet_uri());
    wp_style_add_data( 'pet-care-clinic-style', 'rtl', 'replace' );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'pet_care_clinic_enq_styles');

function pet_care_clinic_enq_scripts(){    
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.js', array('jquery'), '3.3.4', true);
    wp_enqueue_script('nivo', get_template_directory_uri() . '/inc/js/jquery.nivo.slider.js', array('jquery'), '2.0.8', true);
    wp_enqueue_script('jquery.superfish', get_template_directory_uri() . '/inc/js/jquery.superfish.js', array('jquery'), '2.1.5', true);
    wp_enqueue_script('pet-care-clinic-script-js', get_template_directory_uri() . '/inc/js/pet-care-clinic-script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'pet_care_clinic_enq_scripts');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/pet_care_clinic_extra.php';
require get_template_directory() . '/inc/navwalker.php';
require get_template_directory() . '/inc/customizer.php';

function pet_care_clinic_custom_excerpt_length( $length ) {
    return 14;
}
add_filter( 'excerpt_length', 'pet_care_clinic_custom_excerpt_length', 999 );