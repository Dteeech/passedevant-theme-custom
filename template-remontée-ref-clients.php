<?php
/*
Template Name: page de remontée des références Clients
*/

get_header();

// Récupérer le filtre de l'URL
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Arguments pour récupérer les références clients
$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-ref-client.php',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
);

$messages = array(
    'creation-site' => 'Créez votre site web optimisé par le SEO.',
    'seo' => 'Boostez votre visibilité grâce à une stratégie SEO performante.',
    'seo-local' => 'Attirez des clients locaux avec une stratégie SEO localisée.',
    'sea' => 'Générez du trafic qualifié avec des campagnes SEA efficaces.',
    'default' => 'Découvrez nos réalisations.'
);
// Récupérer le message selon le filtre sélectionné
$message = isset($messages[$filter]) ? $messages[$filter] : $messages['default'];

// Si un filtre (taxonomie) est sélectionné, on l'ajoute à la requête
if (!empty($filter)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'type-reference', // Le slug de votre taxonomie
            'field' => 'slug',
            'terms' => $filter
        )
    );
}

$ref_query = new WP_Query($args);

if ($ref_query->have_posts()) :
?>

    <!-- Bloc des filtres -->
    <div class="categories mt-96">
        <div class="container mx-auto flex justify-center gap-4">
            <!-- Lien pour tout afficher -->
            <a href="?filter=" class="category-filter">Tout</a>
            <?php
            // Récupérer les termes de la taxonomie 'categorie_reference_client'
            $args = array(
                'taxonomy' => 'type-reference', // Remplacer par le slug exact de votre taxonomie
                'orderby' => 'name',
                'order' => 'ASC',
            );
            $categories = get_terms($args);

            // Boucle pour afficher les liens de catégories
            foreach ($categories as $category) {
                // Activer la classe active si le filtre correspond à la catégorie en cours
                $active_class = ($filter == $category->slug) ? 'active' : '';

                // Générer l'URL avec le paramètre filter
                $category_link = add_query_arg('filter', $category->slug);

                echo '<a href="' . esc_url($category_link) . '" class="category-filter ' . $active_class . '" data-category="' . $category->slug . '">' . $category->name . '</a>';
            }
            ?>
        </div>
    </div>

    <!-- Boucle pour afficher les références clients -->
    <div class="bento-grid">
        <div class="bento-item <?php echo $size_clas; ?>">
            <div class="bento-content">
                <p><?php echo $message; ?></p>
            </div>
        </div>

        <?php

        while ($ref_query->have_posts()) : $ref_query->the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Image à la une

            // Initialisation correcte de la variable $size_class
            $size_class = 'rectangle-item'; // Par défaut, on assigne la classe rectangle-item

            // Vérification aléatoire pour choisir la taille de l'élément
            $rand_num = rand(0, 4);
            if ($rand_num == 1) {
                $size_class = 'wide-item'; // Exemple aléatoire
            } elseif ($rand_num == 2) {
                $size_class = 'tall-item'; // Exemple aléatoire
            } elseif ($rand_num == 3) {
                $size_class = 'square-item'; // Exemple aléatoire
            } elseif ($rand_num == 4) {
                $size_class = 'long-item'; // Exemple aléatoire
            }
        ?>
            <div class="bento-item <?php echo $size_class; ?>">
                <div class="bento-image" style="background-image: url('<?php echo esc_url($image_url); ?>');">
                    <div class="bento-overlay">
                        <div class="bento-title">
                            <h2><?php the_title(); ?></h2>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
    <style>
        .page-template-template-remonte-ref-clients {
            background-color: #1E1E1E;
            color: white;
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            /* 6 colonnes pour plus de flexibilité */
            grid-gap: 20px;
            grid-auto-flow: dense;
            /* Permet de remplir les espaces vides */
        }

        .bento-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        /* Classe pour 2 colonnes et 2 lignes */
        .rectangle-item {
            grid-column: span 2;
            grid-row: span 2;
            height: 400px;
        }

        /* Classe pour 3 colonnes et 2 lignes */
        .wide-item {
            grid-column: span 3;
            grid-row: span 2;
            height: 400px;
        }

        /* Classe pour 2 colonnes et 3 lignes */
        .tall-item {
            grid-column: span 2;
            grid-row: span 3;
            height: 600px;
        }

        /* Classe pour un élément carré */
        .square-item {
            grid-column: span 2;
            grid-row: span 2;
            height: 400px;
            /* Même hauteur et largeur pour être carré */
        }

        /* Classe pour un élément très large */
        .long-item {
            grid-column: span 4;
            grid-row: span 1;
            height: 300px;
            /* Plus petit en hauteur mais très large */
        }

        /* Classe pour un petit élément */
        .small-item {
            grid-column: span 1;
            grid-row: span 1;
            height: 200px;
            /* Petit élément */
        }

        /* Style des images */
        .bento-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease;
        }

        /* Overlay et texte */
        .bento-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .bento-title h2 {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            position: absolute;
            left: 20px;
            top: 10px;
        }


        /* Effet au survol */
        .bento-item:hover .bento-overlay {
            opacity: 0;
            /* Affiche l'overlay noir */
        }

        .bento-item:hover .bento-title p {
            opacity: 1;
            /* Affiche "Voir le projet" au survol */
        }

        .bento-item:hover .bento-image {
            transform: scale(1.1);
            /* Zoom léger au survol */
        }
    </style>

<?php
else :
    echo '<p>Aucune référence client trouvée.</p>';
endif;

wp_reset_postdata();
get_footer();
