<?php 
get_header();
//the_field('event_date_');
//'orderby' => 'rand',
//'orderby' => 'post_date',
?>

<section class="wrapper-fp">
   <div class="fp-block fp-block-1">

    <article class="guide-whole-wrapper">
<?php 
$homepageGuides = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'guide',
    'orderby' => 'rand',
    'order' => 'ASC',
));

while($homepageGuides->have_posts()) {
    $homepageGuides->the_post(); ?>
     <div class="fp-guide-container">
     <a href="<?php the_permalink(); ?>">
     <div class="fp-guide-image-container"><?php the_post_thumbnail('fpMain'); ?></div>
     <div class="fp-info-container">
     <h1 class="fp-guide-title"><?php echo esc_html( get_the_title() );?></h1>


    <p class="fp-guide-excerpt"><?php  if (has_excerpt()) {
        echo get_the_excerpt();
    } else {
        echo wp_trim_words(get_the_content(), 18); 
    }
    ?></p>
     <p class="fp-guide-link"><a href=" <?php the_permalink(); ?>">discover more</a></p>
     </div>
</a>
    </div>
   
<?php } 
// end of homepage guides
 wp_reset_postdata();
?>
<div class="fp-view-all-guide">
</div>
</article>
</div>
<div class="guide-fp-link-main-container">
<div class="guide-fp-link-main"><p><a href="<?php echo get_post_type_archive_link('guide'); ?>">View all guides</a></p></div>
</div>
<!-- ================================================ -->


<div class="fp-block fp-block-2">

<article class="guide-whole-wrapper parent">
<div class="div-left"><img src = '<?php bloginfo('template_directory'); ?>/images/block-left.svg' alt = 'Picture' /></div>
<div class="div-right"><img src = '<?php bloginfo('template_directory'); ?>/images/block-right.svg' alt = 'Picture' /></a></div>
<div class="explore-title"><a href="<?php echo get_post_type_archive_link('map'); ?>"><h1>Click here to <br> view Map</h1></a></div>
<div class="map-icon"><a href="<?php echo get_post_type_archive_link('map'); ?>"><img src = '<?php bloginfo('template_directory'); ?>/images/map-picture.jpg' alt = 'Picture' /></a></div>
<p class="intro">
Welcome, this is the only guide you need for your adventure to the Peak District. This website contains exclusive content to be enjoyed by all walks of life. 
</p>


</article>
</div>
<!-- ================================================ -->
<div class="guide-fp-link-main-container">
<div class="guide-fp-link-main"><p class="upcoming-events-title">upcoming events</p></div>
</div>

<div class="fp-block fp-block-3">
<article class="guide-events-wrapper">

<?php 
$today = date('Ymd');
$homepageEvents = new WP_Query(array(
    'posts_per_page' => 3,
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
       )
    )
));

while($homepageEvents->have_posts()) {
    $homepageEvents->the_post(); ?>
     
     <div class="events-link-container">
     <a href="<?php the_permalink(); ?>">
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
</article>
</div>

<div class="guide-fp-link-main-container">
<div class="guide-fp-link-main"><p><a href="<?php echo get_post_type_archive_link('event'); ?>">View all events</a></p></div>
</div>


</section>
<?php 


get_footer();
?>





