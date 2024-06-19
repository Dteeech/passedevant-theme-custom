<?php
/*
Template Name: SEO local
*/

get_header(); 
?>
<h1> <?php the_title(); ?> </h1>
<?php while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', get_post_type() );
    
endwhile; // End of the loop.
?>
<?php
get_footer();
?>