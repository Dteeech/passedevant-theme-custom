<?php
/*
Template Name: Template références client
*/

$header_color = 'dark-light';

get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        if (has_post_thumbnail()) {
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            echo '<div class="ref-client-container">';
            echo '<div class="ref-client-banner">';
            echo '<img src="' . esc_url($image_url) . '" alt="' . get_the_title() . '">';
            echo '</div>';
            echo '</div>';
        }
        ?>
        
        <div class="ref-client-content">
            <!-- Contenu Gutenberg -->
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </main>
</div>

<?php
get_footer();
?>
