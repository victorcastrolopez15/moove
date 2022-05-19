<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


if ( ! function_exists('viajes') ) {

	// Register Custom Post Type
	function viajes() {
	
		$labels = array(
			'name'                  => _x( 'Travels', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Travel', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Travels', 'text_domain' ),
			'name_admin_bar'        => __( 'Travels', 'text_domain' ),
			'archives'              => __( 'List travels', 'text_domain' ),
			'attributes'            => __( 'Attributes travels', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent travels:', 'text_domain' ),
			'all_items'             => __( 'All travels', 'text_domain' ),
			'add_new_item'          => __( 'Add New travel', 'text_domain' ),
			'add_new'               => __( 'Add travel', 'text_domain' ),
			'new_item'              => __( 'New travel', 'text_domain' ),
			'edit_item'             => __( 'Edit travel', 'text_domain' ),
			'update_item'           => __( 'Update travel', 'text_domain' ),
			'view_item'             => __( 'View travel', 'text_domain' ),
			'view_items'            => __( 'View travel', 'text_domain' ),
			'search_items'          => __( 'Search travel', 'text_domain' ),
			'not_found'             => __( 'Travel not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Travel not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into travel', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this travel', 'text_domain' ),
			'items_list'            => __( 'List travel', 'text_domain' ),
			'items_list_navigation' => __( 'List navigation travel', 'text_domain' ),
			'filter_items_list'     => __( 'Filter travels list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Travel', 'text_domain' ),
			'description'           => __( 'Holds our travels and travels specific data', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'revisions', 'thumbnail' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-airplane',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'viajes', $args );
	
	}
	add_action( 'init', 'viajes', 0 );
	
}

// 2. Add existing taxonomies to post type
function add_taxonomies_location() {
	$labels = array(
		'name'                  => _x( 'Locations', 'Post Type General Name'),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name'),
		'search_items'          => __( 'Search travel'),
		'all_items'             => __( 'All travels'),
		'parent_item'     		=> __( 'Parent travels:'),
		'parent_item_colon'     => __( 'Parent travels:'),
		'edit_item'             => __( 'Edit travel'),
		'update_item'           => __( 'Update travel'),
		'add_new_item'          => __( 'Add New location'),
		'new_item_name'         => __( 'New travel'),
		'menu_name'             => __( 'Location'),
	);
	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => ['slug'=>'travel'],
	);
	register_taxonomy( 'add_taxonomies_location', ['viajes'], $args);
}
add_action( 'init', 'add_taxonomies_location' );


function add_taxonomies_difficulty() {
	$labels = array(
		'name'                  => _x( 'Difficulties', 'Post Type General Name'),
		'singular_name'         => _x( 'Difficulty', 'Post Type Singular Name'),
		'search_items'          => __( 'Search travel'),
		'all_items'             => __( 'All travels'),
		'parent_item'     		=> __( 'Parent travels:'),
		'parent_item_colon'     => __( 'Parent travels:'),
		'edit_item'             => __( 'Edit travel'),
		'update_item'           => __( 'Update travel'),
		'add_new_item'          => __( 'Add New difficulty'),
		'new_item_name'         => __( 'New travel'),
		'menu_name'             => __( 'Difficulty'),
	);
	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => ['slug'=>'travel'],
	);
	register_taxonomy( 'add_taxonomies_difficulty', ['viajes'], $args);
}
add_action( 'init', 'add_taxonomies_difficulty' );


function add_taxonomies_modality() {
	$labels = array(
		'name'                  => _x( 'Modalities', 'Post Type General Name'),
		'singular_name'         => _x( 'Modality', 'Post Type Singular Name'),
		'search_items'          => __( 'Search travel'),
		'all_items'             => __( 'All travels'),
		'parent_item'     		=> __( 'Parent travels:'),
		'parent_item_colon'     => __( 'Parent travels:'),
		'edit_item'             => __( 'Edit travel'),
		'update_item'           => __( 'Update travel'),
		'add_new_item'          => __( 'Add New modality'),
		'new_item_name'         => __( 'New travel'),
		'menu_name'             => __( 'Modality'),
	);
	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => ['slug'=>'travel'],
	);
	register_taxonomy( 'add_taxonomies_modality', ['viajes'], $args);
}
add_action( 'init', 'add_taxonomies_modality');


function add_taxonomies_typology() {
	$labels = array(
		'name'                  => _x( 'Typologies', 'Post Type General Name'),
		'singular_name'         => _x( 'Typology', 'Post Type Singular Name'),
		'search_items'          => __( 'Search travel'),
		'all_items'             => __( 'All travels'),
		'parent_item'     		=> __( 'Parent travels:'),
		'parent_item_colon'     => __( 'Parent travels:'),
		'edit_item'             => __( 'Edit travel'),
		'update_item'           => __( 'Update travel'),
		'add_new_item'          => __( 'Add New typology'),
		'new_item_name'         => __( 'New travel'),
		'menu_name'             => __( 'Typology'),
	);
	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => ['slug'=>'travel'],
	);
	register_taxonomy( 'add_taxonomies_typology', ['viajes'], $args);
}
add_action( 'init', 'add_taxonomies_typology');


// Menu
function wpb_custom_new_menu() {
	register_nav_menu('my-custom-menu',__( 'Menu footer' ));
	register_nav_menu('columna-uno',__( 'Menu columna uno' ));
	register_nav_menu('columna-dos',__( 'Menu columna dos' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

// Enlaces de la página
function sacar_enlace(){	
	print(get_site_url());
}

function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace("([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 100);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/Ç+/', ' ', $excerpt));
	$excerpt = $excerpt.'... <a href="'.get_permalink().'" class="understrap-read-more-link">Leer más</a>';
	return $excerpt;
  }