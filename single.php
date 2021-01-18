<?php 
get_header();
?>

<section class="peak-about-container-about-page">
    <div>
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); ?>
     
        <p><?php the_content(); ?> </p>
    <?php
	} // end while
} // end if
?>
</div>
</section>


<?php 
get_footer();

?>