<?php 
// echo site_url('/past-events');
get_header(); ?>

<div class="archive-main-title-container">
<div class="archive-main-title">
<?php 
$post_type = get_post_type( get_the_ID() );
echo '<p>' . $post_type . 's</p>';
?>
</div>
</div>

<div class="guide-events-wrapper-archive">
<?php 
while(have_posts()) {
    the_post(); ?>
     
     <div class="events-link-container-archive">
     <a href="<?php the_permalink(); ?>">

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

    
     <p class="events-link-link-archive"><a href=" <?php the_permalink(); ?>">discover more</a></p>
    </div>
</a>
    </div>
   
<?php }
wp_reset_postdata();
?>
</div>
<div class="guide-fp-link-main-container">
<div class="guide-fp-link-main"><p><a href="<?php echo site_url('/past-events'); ?>">past events</a></p></div>
</div>

<?php 
get_footer();

?>

