<?php

function peak_files() {
    wp_register_style('alt_stylesheet', get_template_directory_uri() . '/build/styles.min.css',NULL, 1.1, 'all');
	wp_enqueue_style('alt_stylesheet');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/build/scripts-min.js', NULL, 1.1, true);
    
    //wp_deregister_script('jquery');

    //wp_register_script('jq-file', get_template_directory_uri() . '/js/jquery-3-4-1.js', NULL, 1 , true);
     //wp_enqueue_script('jq-file');
     wp_enqueue_script('googleMap','//maps.googleapis.com/maps/api/js?key=AIzaSyDPhz4-Lv0-qCoDFZ-SD32jVYADTxzJHVw' , NULL, '1.0', true); # to slashes are used instead of http or https(secure) so there will be no erros 

    //wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);


    //wp_enqueue_script('main-peak-js' , get_theme_file_uri('/build/scripts.js'), array( 'jquery' ), microtime(), true);
    wp_enqueue_style('custom-google-fonts','//fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i&display=swap" rel="stylesheet' );
   // wp_enqueue_style('main-peak-style' , get_theme_file_uri('/css/styles.css'), NULL, microtime(), true);
    //wp_enqueue_style('peak_files' , get_stylesheet_uri(), NULL, microtime());
    
}
add_action('wp_enqueue_scripts', 'peak_files');


function peak_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('fpMain', 1100, 500, true); // w, h, crop boollean 
    add_image_size('eventsLinks', 300, 150, true);
    add_image_size('singleLandscape', 1000, 400, true);

  }
  
  add_action('after_setup_theme', 'peak_features');

// sorting archives pagination and order etc 
function peak_adjust_queries($query) {

    if (!is_admin() && is_post_type_archive('map') && $query->is_main_query()) {
        $query->set('posts_per_page',-1);
    }

    if (!is_admin() && is_post_type_archive('guide') && $query->is_main_query()) {
        $query->set('orderby','title');
        $query->set('order','ASC');
        $query->set('posts_per_page',-1);
    }




    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        $query->set('posts_per_page',-1);
        $today = date('Ymd');
         $query->set('meta_key','event_date');
         $query->set('orderby','meta_value_num');
         $query->set('order','ASC');
         $query->set('meta_query', array(
              array (
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
              )
         ));
    }
}

add_action('pre_get_posts' , 'peak_adjust_queries');

function peakMapKey($api) {
   $api['key'] = '';
   return $api;
}

add_filter('acf/fields/google_map/api', 'peakMapKey');











?>