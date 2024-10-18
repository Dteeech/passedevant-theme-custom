<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package passedevant
 */

get_header();
?>

<main id="primary" class="site-main flex">
    <div class="single-content content container justify-center mx-auto pt-44 block lg:flex flex-row gap-4 !w-full">
        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', get_post_type());

            // the_post_navigation(
            //     array(
            //         'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'passedevant') . '</span> <span class="nav-title">%title</span>',
            //         'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'passedevant') . '</span> <span class="nav-title">%title</span>',
            //     )
            // );

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
        <?php get_sidebar('single'); ?>
    </div>
    <style>
        .single-content .post-thumbnail,
        .post-thumbnail img {
            border-radius: 12px;
        }
    </style>


</main><!-- #main -->

<?php
get_footer();
?>