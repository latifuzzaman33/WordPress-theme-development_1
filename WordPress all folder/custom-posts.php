<?php

//register custom post
	
	function create_post_type() {
		
		register_post_type( 'slider',
			array(
				'labels' => array(
						'name' => __( 'sliders','textdomain' ),
						'singular_name' => __( 'slider','textdomain' ),
						'add_new' => __( 'Add New','textdomain' ),
						'add_new_item' => __( 'Add New slider','textdomain' ),
						'edit_item' => __( 'Edit slider' ,'textdomain'),
						'new_item' => __( 'New slider' ,'textdomain'),
						'view_item' => __( 'View slider','textdomain' ),
						'not_found' => __( 'Sorry, we couldn\'t find the slider you are looking for.','textdomain' )
				),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'menu_position' =>10,
			'menu_icon' =>'dashicons-filter',
			'has_archive' => true,
			'hierarchical' => true,
			'capability_type' => 'post',
			'rewrite' => array( 'slug' => 'slider' ),
			'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
			)
		);
		
	

		
	}
	add_action( 'init', 'create_post_type' );
	
	// register custom taxonomy
	
	
	
	  
function custom_post_taxonomy() {
	
	
	register_taxonomy(
		'gallery_cat',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'gallery-image',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                         => 'Department',  //Display name
			'query_var'             => true,
			'show_admin_column'     => true,
			'rewrite'               => array(
				'slug'              => 'gallery-cat', // This controls the base slug that will display before each term
				'with_front'    	=> true // Don't display the category base before
				)
			)
	);
	
	
	
	
}
add_action( 'init', 'custom_post_taxonomy');
	
?>