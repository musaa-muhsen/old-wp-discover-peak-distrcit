<?php


function peak_post_types() {
    //events 
    register_post_type('event', array(
      'taxonomies' => array('category', 'post_tag'),

        'supports' => array('title' , 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-calendar',
        'labels' => array(
          'name' => 'Events', 
          'add_new_item' => 'Add new events',
          'edit_item' => 'Edit Event',
          'all_items' => 'All Events',
          'singular_name' => 'Event'
        )
    ));

      //guide 
      register_post_type('guide', array(
        'taxonomies' => array('category', 'post_tag'),

        'supports' => array('title' , 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'guides'),
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-move',
        'labels' => array(
          'name' => 'Guides', 
          'add_new_item' => 'Add new guide',
          'edit_item' => 'Edit Guide',
          'all_items' => 'All Guides',
          'singular_name' => 'Guide'
        )
    ));

     //campus 
     register_post_type('map', array(
      'taxonomies' => array('category', 'post_tag'),

      'supports' => array('title' , 'editor', 'thumbnail'),
      'rewrite' => array('slug' => 'maps'),
      'has_archive' => true,
      'public' => true,
      'menu_icon' => 'dashicons-location-alt',
      'labels' => array(
        'name' => 'Maps', 
        'add_new_item' => 'Add new map',
        'edit_item' => 'Edit Map',
        'all_items' => 'All Maps',
        'singular_name' => 'Map'
      )
  ));
}
add_action('init', 'peak_post_types');

?>