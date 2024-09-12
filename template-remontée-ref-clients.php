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
    'orderby' => 'title', // Trier par titre
    'order' => 'ASC' // Ordre croissant (A-Z)
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
?>

        <div class="reference-client-item">
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
        <style>
            .hero-remontee-ref-clients {
                background-color: #1E1E1E;
                color: white;
                height: 400px;
            }

            .hero-remontee-ref-clients .container h1 {
                padding-top: 200px;
                height: 100%;
                width: calc(65%);
                margin: auto;
            }

            .references-client-grid {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                /* Ajoute de l'espace entre les colonnes */
                align-items: flex-start;
                /* Espace entre les éléments */
                margin: 0px auto;
                padding: 0;
                /* Ajoute un padding pour que les colonnes ne soient pas collées aux bords */
            }

            .reference-client-item {
                position: relative;
                flex-basis: calc(33.333%);
                /* 3 colonnes qui occupent toute la largeur, moins l'espace entre elles */
                height: auto;
                cursor: pointer;
                align-self: flex-start;
                border: 5px solid white;
            }

            .reference-image {
                background-size: cover;
                background-position: center;
                height: 450px;
                position: relative;
                transition: transform 0.7s ease, opacity 0.7s ease;
                /* Animation de transition pour l'apparition */
                ;
            }

            .reference-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(30, 30, 30, 0.80);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(0.8px);
                -webkit-backdrop-filter: blur(3.2px);
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .reference-image:hover .reference-overlay {
                opacity: 1;
            }

            .reference-info {
                color: white;
                text-align: center;
                padding: 20px;
            }

            .reference-info h2 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .reference-info p {
                font-size: 16px;
                margin-bottom: 20px;
            }

            .reference-link {
                display: inline-block;
                background-color: #fff;
                color: #000;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
            }

            .reference-link:hover {
                background-color: #f5f5f5;
            }
        </style>
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