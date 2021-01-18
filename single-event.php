<?php 
get_header();
?>
<p><a href="<?php echo get_post_type_archive_link('event'); ?>">back</a></p>

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
<div class="guide-fp-link-main"><p class="upcoming-events-title">other events</p></div>
</div>
<div class="single-events-container-link">
 <?php
$today = date('Ymd');
$homepageEvents = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'orderby' => 'rand',
    'order' => 'ASC',
    'meta_query' => array(
       array(
           'key' => 'event_date',
           'compare' => '>=',
           'value' => $today,
           'type' => 'numeric'
       )
    )
));
while($homepageEvents->have_posts()) {
    $homepageEvents->the_post(); ?>
<div class="events-link-container">
<a href=" <?php the_permalink(); ?>">
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
wp_reset_postdata();
?>
</div>
<?php 
get_footer();

?>