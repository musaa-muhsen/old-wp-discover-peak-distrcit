<?php 
// echo site_url(/events);
//the_post_thumbnail_url is the return value, only one value, and the_post_thumbnail() is a wordpress function , define many things???
get_header();
?>

<section class="maps-container-archive">
<div class="acf-map">
<?php 

while(have_posts()) {
    the_post(); 
    $mapLocation = get_field('map_location');
    ?>   
<div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
<p class="maps-title"><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></p>
<p class="maps-sub-title"><a href="<?php echo get_post_permalink(); ?>"><?php echo $mapLocation['address']; ?></a></p>
</div>
<?php }
?>
</div>
</section>

<?php 
   //$mapLocation = get_field('map_location');
   //print_r($mapLocation);
get_footer();

?>