<?php
if ( ! function_exists( 'freelancer_setup' ) ) :

function freelancer_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'freelancer', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'freelancer' ),
        'social'  => __( 'Social Links Menu', 'freelancer' ),
    ) );

/*
     * Register custom menu locations
     */
    /* Pinegrow generated Register Menus Begin */

    /* Pinegrow generated Register Menus End */
    
/*
    * Set image sizes
     */
    /* Pinegrow generated Image sizes Begin */

    /* Pinegrow generated Image sizes End */
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    /*
     * Enable support for Page excerpts.
     */
     add_post_type_support( 'page', 'excerpt' );
}
endif; // freelancer_setup

add_action( 'after_setup_theme', 'freelancer_setup' );


if ( ! function_exists( 'freelancer_init' ) ) :

function freelancer_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    register_post_type('portfolio_item', array(
        'labels' => 
            array(
                'name' => __( 'Portfolio items', 'freelancer' ),
                'singular_name' => __( 'Portfolio item', 'freelancer' )
            ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' )
    ));

    /* Pinegrow generated Custom Post Types End */
    
    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // freelancer_setup

add_action( 'init', 'freelancer_init' );


if ( ! function_exists( 'freelancer_custom_image_sizes_names' ) ) :

function freelancer_custom_image_sizes_names( $sizes ) {

    /*
     * Add names of custom image sizes.
     */
    /* Pinegrow generated Image Sizes Names Begin*/
    /* This code will be replaced by returning names of custom image sizes. */
    /* Pinegrow generated Image Sizes Names End */
    return $sizes;
}
add_action( 'image_size_names_choose', 'freelancer_custom_image_sizes_names' );
endif;// freelancer_custom_image_sizes_names



if ( ! function_exists( 'freelancer_widgets_init' ) ) :

function freelancer_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'freelancer_widgets_init' );
endif;// freelancer_widgets_init



if ( ! function_exists( 'freelancer_customize_register' ) ) :

function freelancer_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'freelancer_customize_register' );
endif;// freelancer_customize_register


if ( ! function_exists( 'freelancer_enqueue_scripts' ) ) :
    function freelancer_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_enqueue_script( 'jquery' );
    wp_deregister_script( 'bootstrapbundle' );
    wp_enqueue_script( 'bootstrapbundle', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', false, null, true);

    wp_deregister_script( 'jqueryeasing' );
    wp_enqueue_script( 'jqueryeasing', get_template_directory_uri() . '/vendor/jquery-easing/jquery.easing.min.js', false, null, true);

    wp_deregister_script( 'jqbootstrapvalidation' );
    wp_enqueue_script( 'jqbootstrapvalidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', false, null, true);

    wp_deregister_script( 'contact_me' );
    wp_enqueue_script( 'contact_me', get_template_directory_uri() . '/js/contact_me.js', false, null, true);

    wp_deregister_script( 'freelancer' );
    wp_enqueue_script( 'freelancer', get_template_directory_uri() . '/js/freelancer.min.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'all' );
    wp_enqueue_style( 'all', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css', false, null, 'all');

    wp_deregister_style( 'style-1' );
    wp_enqueue_style( 'style-1', 'https://fonts.googleapis.com/css?family=Montserrat:400,700', false, null, 'all');

    wp_deregister_style( 'style-2' );
    wp_enqueue_style( 'style-2', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic', false, null, 'all');

    wp_deregister_style( 'freelancer' );
    wp_enqueue_style( 'freelancer', get_template_directory_uri() . '/css/freelancer.min.css', false, null, 'all');

    wp_deregister_style( 'style' );
    wp_enqueue_style( 'style', get_bloginfo('stylesheet_url'), false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'freelancer_enqueue_scripts' );
endif;

function pgwp_sanitize_placeholder($input) { return $input; }
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/wp_pg_helpers.php";

    /* Pinegrow generated Include Resources End */
?>