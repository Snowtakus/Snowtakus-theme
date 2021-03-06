<?php

/**
 * Add custom post type
 *
 * Additional custom post information can be defined here
 * https://codex.wordpress.org/Post_Types
 */
function snowtakus_create_trailers_custom_post_type() {
  $labels = array(
    'name'                  => _x( 'Trailers', 'Post Type General Name', 'snowtakus_text_domain' ),
    'singular_name'         => _x( 'Trailer', 'Post Type Singular Name', 'snowtakus_text_domain' ),
    'menu_name'             => __( 'Trailers', 'snowtakus_text_domain' ),
    'name_admin_bar'        => __( 'Trailer', 'snowtakus_text_domain' ),
    'archives'              => __( 'Trailers Archives', 'snowtakus_text_domain' ),
    'attributes'            => __( 'Trailers Attributes', 'snowtakus_text_domain' ),
    'all_items'             => __( 'All Trailers', 'snowtakus_text_domain' ),
    'add_new_item'          => __( 'Add New Trailer', 'snowtakus_text_domain' ),
    'add_new'               => __( 'Add New', 'snowtakus_text_domain' ),
    'new_item'              => __( 'New Trailer', 'snowtakus_text_domain' ),
    'edit_item'             => __( 'Edit Trailer', 'snowtakus_text_domain' ),
    'update_item'           => __( 'Update Trailer', 'snowtakus_text_domain' ),
    'view_item'             => __( 'View Trailer', 'snowtakus_text_domain' ),
    'view_items'            => __( 'View Trailers', 'snowtakus_text_domain' ),
    'search_items'          => __( 'Search Trailers', 'snowtakus_text_domain' ),
    'not_found'             => __( 'Not found', 'snowtakus_text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'snowtakus_text_domain' ),
    'featured_image'        => __( 'Featured Image', 'snowtakus_text_domain' ),
    'set_featured_image'    => __( 'Set Featured Image', 'snowtakus_text_domain' ),
    'remove_featured_image' => __( 'Remove Featured Image', 'snowtakus_text_domain' ),
    'use_featured_image'    => __( 'Use as Featured Image', 'snowtakus_text_domain' ),
    'insert_into_item'      => __( 'Insert into Trailer', 'snowtakus_text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Trailer', 'snowtakus_text_domain' ),
    'items_list'            => __( 'Trailers List', 'snowtakus_text_domain' ),
    'items_list_navigation' => __( 'Trailers List navigation', 'snowtakus_text_domain' ),
    'filter_items_list'     => __( 'Filter Trailers List', 'snowtakus_text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Trailers', 'snowtakus_text_domain' ),
    'description'           => __( 'Trailers sold by Dura-haul Canada.', 'snowtakus_text_domain' ),
    'labels'                => $labels,
    'supports'              => false,
    'taxonomies'            => array( 'trailer_types' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 20.999,
    'menu_icon'             => 'dashicons-store',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'rewrite'               => array( 'slug' => 'trailers' ),
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
  );
  register_post_type( 'snowtakus_trailers', $args );
}
add_action( 'init', 'snowtakus_create_trailers_custom_post_type', 0 );

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies information can be found here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function snowtakus_trailer_types_custom_taxonomy() {
  register_taxonomy( 'trailer_types', 'snowtakus_trailers', array(
    // hierarchical taxonomy (like categories)
    'hierarchical' => TRUE,
    // this array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Trailer Types', 'taxonomy general name' ),
      'singular_name' => _x( 'Trailer Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Trailer Types' ),
      'all_items' => __( 'All Trailer Types' ),
      'parent_item' => __( 'Parent Trailer Type' ),
      'parent_item_colon' => __( 'Parent Trailer Type:' ),
      'edit_item' => __( 'Edit Trailer Type' ),
      'update_item' => __( 'Update Trailer Type' ),
      'add_new_item' => __( 'Add New Trailer Type' ),
      'new_item_name' => __( 'New Trailer Type Name' ),
      'menu_name' => __( 'Trailer Types' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'trailer-types', // This controls the base slug that will display before each term
      'with_front' => FALSE, // Don't display the category base before "/locations/"
      'hierarchical' => TRUE // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'snowtakus_trailer_types_custom_taxonomy', 0 );
