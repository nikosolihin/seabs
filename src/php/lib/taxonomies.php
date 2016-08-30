<?php
// /**
//  * Register Resource Type Taxonomy
//  */
// function resource_type_taxonomy() {
// 	$labels = array(
// 		'name'                       => _x( 'Resource Types', 'Taxonomy General Name', 'text_domain' ),
// 		'singular_name'              => _x( 'Resource Type', 'Taxonomy Singular Name', 'text_domain' ),
// 		'menu_name'                  => __( 'Types', 'text_domain' ),
// 		'all_items'                  => __( 'All Types', 'text_domain' ),
// 		'parent_item'                => __( 'Parent Type', 'text_domain' ),
// 		'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
// 		'new_item_name'              => __( 'New Type Name', 'text_domain' ),
// 		'add_new_item'               => __( 'Add New Type', 'text_domain' ),
// 		'edit_item'                  => __( 'Edit Type', 'text_domain' ),
// 		'update_item'                => __( 'Update Type', 'text_domain' ),
// 		'view_item'                  => __( 'View Type', 'text_domain' ),
// 		'separate_items_with_commas' => __( 'Separate types with commas', 'text_domain' ),
// 		'add_or_remove_items'        => __( 'Add or remove types', 'text_domain' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used types', 'text_domain' ),
// 		'popular_items'              => __( 'Popular Types', 'text_domain' ),
// 		'search_items'               => __( 'Search types', 'text_domain' ),
// 		'not_found'                  => __( 'Not Found', 'text_domain' ),
// 		'no_terms'                   => __( 'No items', 'text_domain' ),
// 		'items_list'                 => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
// 	);
// 	$rewrite = array(
// 		'slug'                       => 'types',
// 		'with_front'                 => false,
// 		'hierarchical'               => true,
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 		'rewrite'                    => $rewrite,
//     'show_in_rest'               => true,
//     'rest_base'                  => 'resources/types',
//     'rest_controller_class'      => 'WP_REST_Terms_Controller',
// 	);
// 	register_taxonomy( 'resource_type', array( 'resource' ), $args );
// }
// add_action( 'init', 'resource_type_taxonomy', 0 );
//
//
// /**
//  * Register Resource Topic Taxonomy
//  */
// function resource_topic_taxonomy() {
// 	$labels = array(
// 		'name'                       => _x( 'Resource Topics', 'Taxonomy General Name', 'text_domain' ),
// 		'singular_name'              => _x( 'Resource Topic', 'Taxonomy Singular Name', 'text_domain' ),
// 		'menu_name'                  => __( 'Topics', 'text_domain' ),
// 		'all_items'                  => __( 'All Topics', 'text_domain' ),
// 		'parent_item'                => __( 'Parent Topic', 'text_domain' ),
// 		'parent_item_colon'          => __( 'Parent Topic:', 'text_domain' ),
// 		'new_item_name'              => __( 'New Topic Name', 'text_domain' ),
// 		'add_new_item'               => __( 'Add New Topic', 'text_domain' ),
// 		'edit_item'                  => __( 'Edit Topic', 'text_domain' ),
// 		'update_item'                => __( 'Update Topic', 'text_domain' ),
// 		'view_item'                  => __( 'View Topic', 'text_domain' ),
// 		'separate_items_with_commas' => __( 'Separate topics with commas', 'text_domain' ),
// 		'add_or_remove_items'        => __( 'Add or remove topics', 'text_domain' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used topics', 'text_domain' ),
// 		'popular_items'              => __( 'Popular Topics', 'text_domain' ),
// 		'search_items'               => __( 'Search topics', 'text_domain' ),
// 		'not_found'                  => __( 'Not Found', 'text_domain' ),
// 		'no_terms'                   => __( 'No items', 'text_domain' ),
// 		'items_list'                 => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
// 	);
// 	$rewrite = array(
// 		'slug'                       => 'topics',
// 		'with_front'                 => true,
// 		'hierarchical'               => true,
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => false,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 		'rewrite'                    => $rewrite,
//     'show_in_rest'               => true,
//     'rest_base'                  => 'resources/topics',
//     'rest_controller_class'      => 'WP_REST_Terms_Controller',
// 	);
// 	register_taxonomy( 'resource_topic', array( 'resource' ), $args );
// }
// add_action( 'init', 'resource_topic_taxonomy', 0 );

// 
// /**
//  * Register Role Taxonomy
//  */
// function role_taxonomy() {
// 	$labels = array(
// 		'name'                       => _x( 'Roles', 'Taxonomy General Name', 'text_domain' ),
// 		'singular_name'              => _x( 'Role', 'Taxonomy Singular Name', 'text_domain' ),
// 		'menu_name'                  => __( 'Roles', 'text_domain' ),
// 		'all_items'                  => __( 'All Roles', 'text_domain' ),
// 		'parent_item'                => __( 'Parent Role', 'text_domain' ),
// 		'parent_item_colon'          => __( 'Parent Role:', 'text_domain' ),
// 		'new_item_name'              => __( 'New Role Name', 'text_domain' ),
// 		'add_new_item'               => __( 'Add New Role', 'text_domain' ),
// 		'edit_item'                  => __( 'Edit Role', 'text_domain' ),
// 		'update_item'                => __( 'Update Role', 'text_domain' ),
// 		'view_item'                  => __( 'View Role', 'text_domain' ),
// 		'separate_items_with_commas' => __( 'Separate roles with commas', 'text_domain' ),
// 		'add_or_remove_items'        => __( 'Add or remove roles', 'text_domain' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used roles', 'text_domain' ),
// 		'popular_items'              => __( 'Popular Roles', 'text_domain' ),
// 		'search_items'               => __( 'Search roles', 'text_domain' ),
// 		'not_found'                  => __( 'Not Found', 'text_domain' ),
// 		'no_terms'                   => __( 'No items', 'text_domain' ),
// 		'items_list'                 => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
// 	);
// 	$rewrite = array(
// 		'slug'                       => 'roles',
// 		'with_front'                 => true,
// 		'hierarchical'               => true,
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => false,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 		'rewrite'                    => $rewrite
// 	);
// 	register_taxonomy( 'role', array( 'person' ), $args );
// }
// add_action( 'init', 'role_taxonomy', 0 );
