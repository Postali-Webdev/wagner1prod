<?php
/**
 * Custom Attorneys Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_attorneys() {

// set up labels
    $labels = array(
        'name' => 'Attorneys',
        'singular_name' => 'Attorney',
        'add_new' => 'Add New Attorney',
        'add_new_item' => 'Add New Attorney',
        'edit_item' => 'Edit Attorney',
        'new_item' => 'New Attorney',
        'all_items' => 'All Attorneys',
        'view_item' => 'View Attorneys',
        'search_items' => 'Search Attorneys',
        'not_found' =>  'No Attorneys Found',
        'not_found_in_trash' => 'No Attorneys found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Attorneys',

    );
    //register post type
    register_post_type( 'Attorneys', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessman',
        'has_archive' => false,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => '/'),
        'rewrite' => array( 'slug' => 'our-team', 'with_front' => false ), // Has /about/ as pre front for the theme, if there are more then attorneys to be listed under here this need removed
        )
    );

}
add_action( 'init', 'create_custom_post_type_attorneys' );


// Register the "occupation" taxonomy
function register_occupation_taxonomy() {
    register_taxonomy(
        'occupation', // The name of the taxonomy
        'attorneys', // The post type name your taxonomy will be attached to
        array(
            'hierarchical' => false, // Set to true if you want a hierarchical taxonomy, false for non-hierarchical
            'label' => 'Occupations', // The label for the taxonomy
            'singular_label' => 'Occupation', // The singular label for the taxonomy
            'public' => true, // Set to true for a public taxonomy, false for private
            'show_ui' => true, // Set to true to display the taxonomy in the admin menu
            'show_admin_column' => true, // Set to true to add the taxonomy to the list of columns in the post edit screen
            'query_var' => true, // Set to true if you want to use this taxonomy in a query
            'meta_box_cb' => 'post_categories_meta_box',
            'rewrite' => array(
                'slug' => 'occupation', // The URL slug for this taxonomy
                'with_front' => false, // Set to false if you don't want the slug to appear in the URL
                'hierarchical' => false, // Set to true if you want a hierarchical URL structure
            ),
        )
    );
}
add_action('init', 'register_occupation_taxonomy');


// Update the "attorney" custom post type to support the "occupation" taxonomy
function update_attorney_cpt_to_support_taxonomy() {
    register_taxonomy_for_object_type('occupation', 'attorneys');
}
add_action('init', 'update_attorney_cpt_to_support_taxonomy');
