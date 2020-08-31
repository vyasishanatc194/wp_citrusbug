<?php
/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function engage_custom_enqueue_child_theme_styles() {
	wp_enqueue_style( 'wp_mead-child-style', get_stylesheet_uri(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'engage_custom_enqueue_child_theme_styles', 11 );

require_once get_theme_file_path('class-wp-bootstrap-navwalker.php');

/** ==================================================================================== */
function custom_custom_post_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x(
	 'Custom Posts', 'Post Type General Name', 'Citrusbug_creative' ),
			'singular_name'       => _x(
	 'Custom Posts', 'Post Type Singular Name', 'Citrusbug_creative' ),
			'menu_name'           => __( 'Custom Posts', 'Citrusbug_creative' ),
			'parent_item_colon'   => __( 'Parent Custom Posts', 'Citrusbug_creative' ),
			'all_items'           => __( 'All Custom Posts', 'Citrusbug_creative' ),
			'view_item'           => __( 'View Custom Posts', 'Citrusbug_creative' ),
			'add_new_item'        => __( 'Add New Custom Posts', 'Citrusbug_creative' ),
			'add_new'             => __( 'Add New Custom Posts', 'Citrusbug_creative' ),
			'edit_item'           => __( 'Edit Custom Posts', 'Citrusbug_creative' ),
			'update_item'         => __( 'Update Custom Posts', 'Citrusbug_creative' ),
			'search_items'        => __( 'Search Custom Posts', 'Citrusbug_creative' ),
			'not_found'           => __( 'Not Found', 'Citrusbug_creative' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'Citrusbug_creative' ),
		);
	
	// Set other options for Custom Post Type
		$rewrite = array(
			'slug'                => 'custom_post',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Custom Posts', 'text_domain' ),
			'description'         => __( 'Custom Posts information pages', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
			'taxonomies'          => array('custom_postcategory'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-site-alt3',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => "",
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
	
		);
	
		// Registering your Custom Post Type
		register_post_type( 'custom_post', $args );
	
	}
	
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
	
	add_action( 'init', 'custom_custom_post_post_type', 0 );

/** ==================================================================================== */
function custom_testimonials_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x(
	 'Testnimonials', 'Post Type General Name', 'Citrusbug_creative' ),
			'singular_name'       => _x(
	 'Testnimonials', 'Post Type Singular Name', 'Citrusbug_creative' ),
			'menu_name'           => __( 'Testnimonials', 'Citrusbug_creative' ),
			'parent_item_colon'   => __( 'Parent Testnimonials', 'Citrusbug_creative' ),
			'all_items'           => __( 'All Testnimonials', 'Citrusbug_creative' ),
			'view_item'           => __( 'View Testnimonials', 'Citrusbug_creative' ),
			'add_new_item'        => __( 'Add New Testnimonials', 'Citrusbug_creative' ),
			'add_new'             => __( 'Add New Testnimonials', 'Citrusbug_creative' ),
			'edit_item'           => __( 'Edit Testnimonials', 'Citrusbug_creative' ),
			'update_item'         => __( 'Update Testnimonials', 'Citrusbug_creative' ),
			'search_items'        => __( 'Search Testnimonials', 'Citrusbug_creative' ),
			'not_found'           => __( 'Not Found', 'Citrusbug_creative' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'Citrusbug_creative' ),
		);
	
	// Set other options for Custom Post Type
		$rewrite = array(
			'slug'                => 'testnimonials',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Testnimonials', 'text_domain' ),
			'description'         => __( 'Testnimonials information pages', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
			'taxonomies'          => array('testnimonialscategory'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-site-alt3',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => "",
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
	
		);
	
		// Registering your Custom Post Type
		register_post_type( 'testnimonials', $args );
	
	}
	
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
	
	add_action( 'init', 'custom_testimonials_post_type', 0 );

/** ==================================================================================== */
function custom_solved_problems_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x(
	 'Solved Problems', 'Post Type General Name', 'Citrusbug_creative' ),
			'singular_name'       => _x(
	 'Solved Problems', 'Post Type Singular Name', 'Citrusbug_creative' ),
			'menu_name'           => __( 'Solved Problems', 'Citrusbug_creative' ),
			'parent_item_colon'   => __( 'Parent Solved Problems', 'Citrusbug_creative' ),
			'all_items'           => __( 'All Solved Problems', 'Citrusbug_creative' ),
			'view_item'           => __( 'View Solved Problems', 'Citrusbug_creative' ),
			'add_new_item'        => __( 'Add New Solved Problems', 'Citrusbug_creative' ),
			'add_new'             => __( 'Add New Solved Problems', 'Citrusbug_creative' ),
			'edit_item'           => __( 'Edit Solved Problems', 'Citrusbug_creative' ),
			'update_item'         => __( 'Update Solved Problems', 'Citrusbug_creative' ),
			'search_items'        => __( 'Search Solved Problems', 'Citrusbug_creative' ),
			'not_found'           => __( 'Not Found', 'Citrusbug_creative' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'Citrusbug_creative' ),
		);
	
	// Set other options for Custom Post Type
		$rewrite = array(
			'slug'                => 'solved_problems',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Solved Problems', 'text_domain' ),
			'description'         => __( 'Solved Problems information pages', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'feature-image', 'thumbnail', 'custom-fields', 'page-attributes' ),
			'taxonomies'          => array('solved_problemscategory'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-site-alt3',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => "",
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
	
		);
	
		// Registering your Custom Post Type
		register_post_type( 'solved_problems', $args );
	
	}
	
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
	
	add_action( 'init', 'custom_solved_problems_post_type', 0 );

/** ==================================================================================== */
function custom_our_clients_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x(
	 'Our Clients', 'Post Type General Name', 'Citrusbug_creative' ),
			'singular_name'       => _x(
	 'Our Clients', 'Post Type Singular Name', 'Citrusbug_creative' ),
			'menu_name'           => __( 'Our Clients', 'Citrusbug_creative' ),
			'parent_item_colon'   => __( 'Parent Our Clients', 'Citrusbug_creative' ),
			'all_items'           => __( 'All Our Clients', 'Citrusbug_creative' ),
			'view_item'           => __( 'View Our Clients', 'Citrusbug_creative' ),
			'add_new_item'        => __( 'Add New Our Clients', 'Citrusbug_creative' ),
			'add_new'             => __( 'Add New Our Clients', 'Citrusbug_creative' ),
			'edit_item'           => __( 'Edit Our Clients', 'Citrusbug_creative' ),
			'update_item'         => __( 'Update Our Clients', 'Citrusbug_creative' ),
			'search_items'        => __( 'Search Our Clients', 'Citrusbug_creative' ),
			'not_found'           => __( 'Not Found', 'Citrusbug_creative' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'Citrusbug_creative' ),
		);
	
	// Set other options for Custom Post Type
		$rewrite = array(
			'slug'                => 'our_clients',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Our Clients', 'text_domain' ),
			'description'         => __( 'Our Clients information pages', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'feature-image', 'thumbnail' ),
			'taxonomies'          => array('our_clientscategory'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-site-alt3',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => "",
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
	
		);
	
		// Registering your Custom Post Type
		register_post_type( 'our_clients', $args );
	
	}
	
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
	
	add_action( 'init', 'custom_our_clients_post_type', 0 );

/** ==================================================================================== */
// Register Custom Post Type
function register_use_cases() {

	$labels = array(
		'name'                  => 'Use Case',
		'singular_name'         => 'Use Case',
		'menu_name'             => 'Use Case',
		'name_admin_bar'        => 'Use Case',
		'archives'              => 'Use Case Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Use Cases',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'use_cases_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'use_cases', $args );
}
add_action( 'init', 'register_use_cases', 0 );

/** ==================================================================================== */

function custom_benefits_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x(
	 'Benefits', 'Post Type General Name', 'Citrusbug_creative' ),
			'singular_name'       => _x(
	 'Benefits', 'Post Type Singular Name', 'Citrusbug_creative' ),
			'menu_name'           => __( 'Benefits', 'Citrusbug_creative' ),
			'parent_item_colon'   => __( 'Parent Benefits', 'Citrusbug_creative' ),
			'all_items'           => __( 'All Benefits', 'Citrusbug_creative' ),
			'view_item'           => __( 'View Benefits', 'Citrusbug_creative' ),
			'add_new_item'        => __( 'Add New Benefits', 'Citrusbug_creative' ),
			'add_new'             => __( 'Add New Benefits', 'Citrusbug_creative' ),
			'edit_item'           => __( 'Edit Benefits', 'Citrusbug_creative' ),
			'update_item'         => __( 'Update Benefits', 'Citrusbug_creative' ),
			'search_items'        => __( 'Search Benefits', 'Citrusbug_creative' ),
			'not_found'           => __( 'Not Found', 'Citrusbug_creative' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'Citrusbug_creative' ),
		);
	
	// Set other options for Custom Post Type
		$rewrite = array(
			'slug'                => 'benefits',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Benefits', 'text_domain' ),
			'description'         => __( 'Benefits information pages', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
			'taxonomies'          => array('benefitscategory'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-site-alt3',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => "",
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
	
		);
	
		// Registering your Custom Post Type
		register_post_type( 'benefits', $args );
	
	}
	
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
	
	add_action( 'init', 'custom_benefits_post_type', 0 );

/** ==================================================================================== */
// Register Custom Post Type
function register_service() {

	$labels = array(
		'name'                  => 'Service',
		'singular_name'         => 'Service',
		'menu_name'             => 'Service',
		'name_admin_bar'        => 'Service',
		'archives'              => 'Service Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Service',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'service_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'service', $args );
}
add_action( 'init', 'register_service', 0 );

/** ============================================================================================== */

// Register Custom Post Type
function register_industries() {

	$labels = array(
		'name'                  => 'Industries',
		'singular_name'         => 'Industries',
		'menu_name'             => 'Industries',
		'name_admin_bar'        => 'Industries',
		'archives'              => 'Industries Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Industries',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'industries_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'industries', $args );
}
add_action( 'init', 'register_industries', 0 );

/** ==================================================================================== */
function custom_features_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x(
	 'Features', 'Post Type General Name', 'Citrusbug_creative' ),
			'singular_name'       => _x(
	 'Features', 'Post Type Singular Name', 'Citrusbug_creative' ),
			'menu_name'           => __( 'Features', 'Citrusbug_creative' ),
			'parent_item_colon'   => __( 'Parent Features', 'Citrusbug_creative' ),
			'all_items'           => __( 'All Features', 'Citrusbug_creative' ),
			'view_item'           => __( 'View Features', 'Citrusbug_creative' ),
			'add_new_item'        => __( 'Add New Features', 'Citrusbug_creative' ),
			'add_new'             => __( 'Add New Features', 'Citrusbug_creative' ),
			'edit_item'           => __( 'Edit Features', 'Citrusbug_creative' ),
			'update_item'         => __( 'Update Features', 'Citrusbug_creative' ),
			'search_items'        => __( 'Search Features', 'Citrusbug_creative' ),
			'not_found'           => __( 'Not Found', 'Citrusbug_creative' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'Citrusbug_creative' ),
		);
	
	// Set other options for Custom Post Type
		$rewrite = array(
			'slug'                => 'features',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'Features', 'text_domain' ),
			'description'         => __( 'Features information pages', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
			'taxonomies'          => array('featurescategory'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-site-alt3',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => "",
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
	
		);	
		// Registering your Custom Post Type
		register_post_type( 'features', $args );
	
	}
	
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
	
	add_action( 'init', 'custom_features_post_type', 0 );

// ==================================================================================================================================== //
// Register Custom Post Type
function register_capability() {

	$labels = array(
		'name'                  => 'Capabilities',
		'singular_name'         => 'Capability',
		'menu_name'             => 'Capabilities',
		'name_admin_bar'        => 'Capability',
		'archives'              => 'Capability Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Capability',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'capability_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'capabilities', $args );
}
add_action( 'init', 'register_capability', 0 );

// ==================================================================================================================================== //

/**
 * ACF Theme Options
 */
if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
        )
    );
}

/**
 * Add ACF Options to Admin Bar
 */
add_action( 'admin_bar_menu', 'options_adminbar', 999 );

function options_adminbar( $wp_admin_bar ) {
    $args = array(
        'id'    => 'theme_options',
        'title' => 'Theme Options',
        'href'  => '/wp-admin/admin.php?page=theme-general-settings',
    );
    $wp_admin_bar->add_node( $args );
}

/**
 * Includes
 */
//ajax localise
function pw1_load_scripts() {
	wp_enqueue_script('pw1-script', 'https://makitweb.com/demo/jquery.js', array('jquery'));
	wp_localize_script('pw1-script', 'pw1_script_vars', array(
	  'ajaxurl' => admin_url('admin-ajax.php'),
	  'siteurl' => get_stylesheet_directory_uri(),
	  'security' => wp_create_nonce('Citrusbug'),
	)); 
  }
add_action('wp_enqueue_scripts', 'pw1_load_scripts');

get_template_part( 'functions/hooks');
get_template_part( 'functions/ajax');
get_template_part( 'functions/class', 'qs' );

/**
 * Logo & Description
 */
/**
 * Displays the site logo, either text or image.
 *
 * @param array   $args Arguments for displaying the site logo either as an image or text.
 * @param boolean $echo Echo or return the HTML.
 *
 * @return string $html Compiled HTML based on our arguments.
 */
function Citrusbug_site_logo( $args = array(), $echo = true ) {
	$logo       = get_custom_logo();
	$site_title = get_bloginfo( 'name' );
	$contents   = '';
	$classname  = '';

	$defaults = array(
		'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class'  => 'site-logo',
		'title'       => '<a href="%1$s">%2$s</a>',
		'title_class' => 'site-title',
		'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
		'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
		'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
	);

	$args = wp_parse_args( $args, $defaults );

	/**
	 * Filters the arguments for `Citrusbug_site_logo()`.
	 *
	 * @param array  $args     Parsed arguments.
	 * @param array  $defaults Function's default arguments.
	 */
	$args = apply_filters( 'Citrusbug_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
		$classname = $args['logo_class'];
	} else {
		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
		$classname = $args['title_class'];
	}

	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

	$html = sprintf( $args[ $wrap ], $classname, $contents );

	/**
	 * Filters the arguments for `Citrusbug_site_logo()`.
	 *
	 * @param string $html      Compiled html based on our arguments.
	 * @param array  $args      Parsed arguments.
	 * @param string $classname Class name based on current view, home or single.
	 * @param string $contents  HTML for site title or logo.
	 */
	$html = apply_filters( 'Citrusbug_site_logo', $html, $args, $classname, $contents );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

function wpmm_setup() {
    register_nav_menus( array(
        'mega_menu' => 'Mega Menu'
    ) );
}
add_action( 'after_setup_theme', 'wpmm_setup' );

function wpmm_init() {
    $location = 'mega_menu';
    $css_class = 'has-mega-menu';
    $locations = get_nav_menu_locations();
    if ( isset( $locations[ $location ] ) ) {
        $menu = get_term( $locations[ $location ], 'nav_menu' );
        if ( $items = wp_get_nav_menu_items( @$menu->name ) ) {
            foreach ( $items as $item ) {
                if ( in_array( $css_class, $item->classes ) ) {
                    register_sidebar( array(
                        'id'   => 'mega-menu-widget-area-' . $item->ID,
                        'name' => $item->title . ' - Mega Menu',
                    ) );
                }
            }
        }
    }
}
add_action( 'widgets_init', 'wpmm_init' );
