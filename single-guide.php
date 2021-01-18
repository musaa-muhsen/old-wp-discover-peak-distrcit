<?php 

get_header();
// the_ID();
//  the_post_thumbnail();

?>
<section class="top-block-single">

<?php 
while(have_posts()) {
    the_post(); ?>
 <div class="single-wrapper">
   <div class="single-title"><?php the_title(); ?></div>
    <div class="single-content-container"> 
      <div class="single-images-peak"><?php the_post_thumbnail('singleLandscape'); ?></div>
      <div class="single-newspaper"><p class=""><?php the_content(); ?></p></div>
    </div>
</div>
<?php }
wp_reset_postdata();

?>
</section>
<div class="guide-fp-link-main-container">
<div class="guide-fp-link-main"><p><a href="<?php echo get_post_type_archive_link('guide'); ?>">back to guides</a></p></div>
</div>
<!-- =============== bottom block starts ============================== -->
<section class="bottom-block-single">
    <article class="events-bottom-block-single">
        <div class="events-bottom-single-wrapper">
<?php 
// if i wanted more add WP_Query as well as adding while loop 
//obtaining the advanced custom field from backend events posts
 //get events first meta query will filter the dates above today the second meta query will filter any events that contain the current guide and then the loop outputs the data 
$today = date('Ymd');
$homepageEvents = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
       array(
           'key' => 'event_date',
           'compare' => '>=',
           'value' => $today,
           'type' => 'numeric'
       ), array (
        'key' => 'related_guides',
        'compare' => 'LIKE', //aka contains 
        'value' =>  '"' . get_the_ID() . '"'
       )
    )
));

if ($homepageEvents->have_posts()) {
   
echo '<div class="close-events"><p>Upcoming events near ' . get_the_title() . ' </p></div>';
while($homepageEvents->have_posts()) {
    $homepageEvents->the_post(); ?>
   <div class="events-link-container">
   <a class="hover-effects" href="<?php the_permalink(); ?>">

     <div class="events-link-image-container"><?php the_post_thumbnail('eventsLinks'); ?></div>
     <div class="events-link-info-container">
     <h1 class="events-link-title"><?php echo esc_html( get_the_title() ); ?></h1>
     <p class="events-link-date"> <span><?php 
        $eventDate = new DateTime(get_field('event_date'));
        echo $eventDate->format('M'); ?>
   </span>
   <span><?php 
        $eventDate = new DateTime(get_field('event_date'));
        echo $eventDate->format('d');
    ?> </span></p>

    
     <p class="events-link-link"><a href=" <?php the_permalink(); ?>">discover more</a></p>
    </div>
</a>
    </div>
   
<?php }
} // end of if and loop 

wp_reset_postdata();
?>
</div>
</article>
<!-- ============================== map =========================== -->
<article class="map-bottom-block-single">
    <div class="single-map">
    <div class="events-bottom-single-wrapper">

<?php 
$relatedMaps = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'map',
    'meta_query' => array(
        array(
            'key' => 'guides_4_map',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"'
            
        )
     )
    
));
echo '<div class="close-events"><p>Location of ' . get_the_title() . ' </p></div>';

while($relatedMaps->have_posts()) {
    $relatedMaps->the_post(); ?>
   <div class="acf-map">
<?php $mapLocation = get_field('map_location'); ?>   
<div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
<p class="maps-title"><?php the_title(); ?></p>
<p class="maps-sub-title"><?php echo $mapLocation['address']; ?></p>
</div>

</div>
<?php 
 } 
wp_reset_postdata();
?>
</div>
</div>
</article>
</section>
<?php

get_footer();

?>