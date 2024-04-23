<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );


// Register Custom Post Type STORES
function custom_post_type_stores() {

    $labels = array(
        'name'                  => _x( 'Stores', 'Post Type General Name', 'chemistwarehouse' ),
        'singular_name'         => _x( 'Store', 'Post Type Singular Name', 'chemistwarehouse' ),
        'menu_name'             => __( 'Stores', 'chemistwarehouse' ),
        'name_admin_bar'        => __( 'Stores', 'chemistwarehouse' ),
        'archives'              => __( 'Store Archives', 'chemistwarehouse' ),
        'attributes'            => __( 'Store Attributes', 'chemistwarehouse' ),
        'parent_item_colon'     => __( 'Parent Store:', 'chemistwarehouse' ),
        'all_items'             => __( 'All Stores', 'chemistwarehouse' ),
        'add_new_item'          => __( 'Add New Store', 'chemistwarehouse' ),
        'add_new'               => __( 'Add New', 'chemistwarehouse' ),
        'new_item'              => __( 'New Store', 'chemistwarehouse' ),
        'edit_item'             => __( 'Edit Store', 'chemistwarehouse' ),
        'update_item'           => __( 'Update Store', 'chemistwarehouse' ),
        'view_item'             => __( 'View Store', 'chemistwarehouse' ),
        'view_items'            => __( 'View Stores', 'chemistwarehouse' ),
        'search_items'          => __( 'Search Store', 'chemistwarehouse' ),
        'not_found'             => __( 'Not found', 'chemistwarehouse' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'chemistwarehouse' ),
        'featured_image'        => __( 'Featured Image', 'chemistwarehouse' ),
        'set_featured_image'    => __( 'Set featured image', 'chemistwarehouse' ),
        'remove_featured_image' => __( 'Remove featured image', 'chemistwarehouse' ),
        'use_featured_image'    => __( 'Use as featured image', 'chemistwarehouse' ),
        'insert_into_item'      => __( 'Insert into Store', 'chemistwarehouse' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Store', 'chemistwarehouse' ),
        'items_list'            => __( 'Stores list', 'chemistwarehouse' ),
        'items_list_navigation' => __( 'Stores list navigation', 'chemistwarehouse' ),
        'filter_items_list'     => __( 'Filter Stores list', 'chemistwarehouse' ),
    );
    $args = array(
        'label'                 => __( 'Store', 'chemistwarehouse' ),
        'description'           => __( 'Stores for your website', 'chemistwarehouse' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-store',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'stores' ),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'stores', $args );

}
add_action( 'init', 'custom_post_type_stores', 0 );

// Register Custom Post Type JOBS
function custom_post_type_jobs() {

    $labels = array(
        'name'                  => _x( 'Jobs', 'Post Type General Name', 'chemistwarehouse' ),
        'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'chemistwarehouse' ),
        'menu_name'             => __( 'Jobs', 'chemistwarehouse' ),
        'name_admin_bar'        => __( 'Jobs', 'chemistwarehouse' ),
        'archives'              => __( 'Job Archives', 'chemistwarehouse' ),
        'attributes'            => __( 'Job Attributes', 'chemistwarehouse' ),
        'parent_item_colon'     => __( 'Parent Job:', 'chemistwarehouse' ),
        'all_items'             => __( 'All Jobs', 'chemistwarehouse' ),
        'add_new_item'          => __( 'Add New Job', 'chemistwarehouse' ),
        'add_new'               => __( 'Add New', 'chemistwarehouse' ),
        'new_item'              => __( 'New Job', 'chemistwarehouse' ),
        'edit_item'             => __( 'Edit Job', 'chemistwarehouse' ),
        'update_item'           => __( 'Update Job', 'chemistwarehouse' ),
        'view_item'             => __( 'View Job', 'chemistwarehouse' ),
        'view_items'            => __( 'View Jobs', 'chemistwarehouse' ),
        'search_items'          => __( 'Search Job', 'chemistwarehouse' ),
        'not_found'             => __( 'Not found', 'chemistwarehouse' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'chemistwarehouse' ),
        'featured_image'        => __( 'Featured Image', 'chemistwarehouse' ),
        'set_featured_image'    => __( 'Set featured image', 'chemistwarehouse' ),
        'remove_featured_image' => __( 'Remove featured image', 'chemistwarehouse' ),
        'use_featured_image'    => __( 'Use as featured image', 'chemistwarehouse' ),
        'insert_into_item'      => __( 'Insert into Job', 'chemistwarehouse' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Job', 'chemistwarehouse' ),
        'items_list'            => __( 'Jobs list', 'chemistwarehouse' ),
        'items_list_navigation' => __( 'Jobs list navigation', 'chemistwarehouse' ),
        'filter_items_list'     => __( 'Filter Jobs list', 'chemistwarehouse' ),
    );
    $args = array(
        'label'                 => __( 'Job', 'chemistwarehouse' ),
        'description'           => __( 'Jobs for your website', 'chemistwarehouse' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-welcome-write-blog',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'jobs' ),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'jobs', $args );

}
add_action( 'init', 'custom_post_type_jobs', 0 );



// Register Custom Post Type
function custom_post_type_catalogues() {

    $labels = array(
        'name'                  => _x( 'Catalogues', 'Post Type General Name', 'chemistwarehouse' ),
        'singular_name'         => _x( 'Catalogue', 'Post Type Singular Name', 'chemistwarehouse' ),
        'menu_name'             => __( 'Catalogues', 'chemistwarehouse' ),
        'name_admin_bar'        => __( 'Catalogues', 'chemistwarehouse' ),
        'archives'              => __( 'Catalogue Archives', 'chemistwarehouse' ),
        'attributes'            => __( 'Catalogue Attributes', 'chemistwarehouse' ),
        'parent_item_colon'     => __( 'Parent Catalogue:', 'chemistwarehouse' ),
        'all_items'             => __( 'All Catalogues', 'chemistwarehouse' ),
        'add_new_item'          => __( 'Add New Catalogue', 'chemistwarehouse' ),
        'add_new'               => __( 'Add New', 'chemistwarehouse' ),
        'new_item'              => __( 'New Catalogue', 'chemistwarehouse' ),
        'edit_item'             => __( 'Edit Catalogue', 'chemistwarehouse' ),
        'update_item'           => __( 'Update Catalogue', 'chemistwarehouse' ),
        'view_item'             => __( 'View Catalogue', 'chemistwarehouse' ),
        'view_items'            => __( 'View Catalogues', 'chemistwarehouse' ),
        'search_items'          => __( 'Search Catalogues', 'chemistwarehouse' ),
        'not_found'             => __( 'Not found', 'chemistwarehouse' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'chemistwarehouse' ),
        'featured_image'        => __( 'Featured Image', 'chemistwarehouse' ),
        'set_featured_image'    => __( 'Set featured image', 'chemistwarehouse' ),
        'remove_featured_image' => __( 'Remove featured image', 'chemistwarehouse' ),
        'use_featured_image'    => __( 'Use as featured image', 'chemistwarehouse' ),
        'insert_into_item'      => __( 'Insert into Catalogue', 'chemistwarehouse' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Catalogue', 'chemistwarehouse' ),
        'items_list'            => __( 'Catalogues list', 'chemistwarehouse' ),
        'items_list_navigation' => __( 'Catalogues list navigation', 'chemistwarehouse' ),
        'filter_items_list'     => __( 'Filter Catalogues list', 'chemistwarehouse' ),
    );
    $args = array(
        'label'                 => __( 'Catalogue', 'chemistwarehouse' ),
        'description'           => __( 'Catalogues for Chemist Warehouse website', 'chemistwarehouse' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'catalogues' ),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'catalogues', $args );

}
add_action( 'init', 'custom_post_type_catalogues', 0 );
