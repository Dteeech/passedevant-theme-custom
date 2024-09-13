<?php
/*
Template Name: page de remontée des références Clients
*/

get_header();

// Arguments pour récupérer les références clients
$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-ref-client.php',
    'posts_per_page' => -1,
    'order' => 'rand' // Ordre croissant (A-Z)
);

$ref_query = new WP_Query($args);

if ($ref_query->have_posts()) :
    echo '
    <div class="hero-remontee-ref-clients ">
    <div class="container">

        <h1>Nos réalisations !</h1>
        </div>
    </div>
    <div class="references-client-grid">
    ';

    while ($ref_query->have_posts()) : $ref_query->the_post();
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Image à la une

        // Attribuer une classe aléatoire pour la taille
        $sizes = array('small', 'medium', 'large');
        $random_size = $sizes[array_rand($sizes)];
?>
        <style>
            .reference-client-item {
                position: relative;
                overflow: hidden;
                border: 5px solid white;
                cursor: pointer;
            }

            .reference-client-item.small {
                grid-column: span 1;
                grid-row: span 1;
                height: 200px;
            }

            .reference-client-item.medium {
                grid-column: span 2;
                grid-row: span 2;
                height: 400px;
            }

            .reference-client-item.large {
                grid-column: span 3;
                grid-row: span 3;
                height: 600px;
            }

            .reference-image {
                background-size: cover;
                background-position: center;
                height: 100%;
                position: relative;
                transition: transform 0.7s ease, opacity 0.7s ease;
            }

            .reference-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(30, 30, 30, 0.80);
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .reference-image:hover .reference-overlay {
                opacity: 1;
            }
        </style>
        <div class="reference-client-item <?php echo $random_size; ?>">
            <div class="reference-image" style="background-image: url('<?php echo esc_url($image_url); ?>');">
                <div class="reference-overlay">
                    <div class="reference-info">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="reference-link">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (rand(0, 1)) : ?>
            <div class="reference-client-item cta-block">
                <div class="cta-content">
                    <h2><?php the_field('cta_title'); ?></h2>
                    <a href="<?php the_field('cta_link'); ?>" class="cta-button">
                        <?php the_field('cta_text'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        ?>
<?php
    endwhile;
    echo '
  
    </div>
    ';
else :
    echo '<p>Aucune référence client trouvée.</p>';
endif;

wp_reset_postdata();
get_footer();
?>