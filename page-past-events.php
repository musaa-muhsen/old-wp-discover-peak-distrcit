<?php 
// echo site_url(/events);
get_header();
?>
<div class="archive-main-title-container">
<div class="archive-main-title">
<p>past events</p>
</div>
</div>


<?php 

$today = date('Ymd');
$pastEvents = new WP_Query(array(
    'paged' => get_query_var('paged', 1),
    'posts_per_page' => 10,
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
       array(
           'key' => 'event_date',
           'compare' => '<',
           'value' => $today,
           'type' => 'numeric'
       )
    )
));
?>
<div class="guide-events-wrapper-archive">
<?php
while($pastEvents->have_posts()) {
    $pastEvents->the_post(); ?>
      <div class="events-link-container-archive">
     <div class="events-link-image-container-archive"><?php the_post_thumbnail('eventsLinks'); ?></div>
     <div class="events-link-info-container-archive">
     <h1 class="events-link-title-archive"><?php echo esc_html( get_the_title() ); ?></h1>
     <p class="events-link-date-archive"> <span><?php 
        $eventDate = new DateTime(get_field('event_date'));
        echo $eventDate->format('M'); ?>
   </span>
   <span><?php 
        $eventDate = new DateTime(get_field('event_date'));
        echo $eventDate->format('d');
    ?> </span></p>

    
     <p class="events-link-link-archive"><a href=" <?php the_permalink(); ?>">More info</a></p>
    </div>
  
    </div>
<?php }


echo paginate_links(array(
    'total' => $pastEvents->max_num_pages
));
?>
    </div>

<div class="guide-fp-link-main-container">
<div class="guide-fp-link-main"><p><a href="<?php echo get_post_type_archive_link('event'); ?>">back to All events</a></p></div>
</div>
<?php 
get_footer();

?>
