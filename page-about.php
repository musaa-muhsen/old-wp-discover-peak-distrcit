<?php 
get_header();
?>
hello
<section class="peak-about-container-about-page">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); ?>
        
        <p><?php the_content(); ?> </p>
    <?php
	} // end while
} // end if
?>
</section>


<?php 
get_footer();

?>