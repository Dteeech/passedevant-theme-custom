<?php
/*
Template Name: page de remontée des références Clients
*/

get_header();


$filter = get_query_var('type-reference');



$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-ref-client.php',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
);

if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;

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
    <div class="categories">
        <div class="container mx-auto flex justify-center gap-4">
            <!-- Lien pour tout afficher -->
            <a href="<?php echo site_url('/references'); ?>" class="category-filter <?php if (empty($filter)) echo 'active'; ?>">Tout</a>
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
                $category_link = site_url('/references/' . $category->slug);

                echo '<a href="' . esc_url($category_link) . '" class="category-filter ' . $active_class . '">' . $category->name . '</a>';
            }
            ?>
        </div>
    </div>

    <!-- Boucle pour afficher les références clients -->
    <div class="refs-grid">
        <?php
        while ($ref_query->have_posts()) : $ref_query->the_post();

            // Récupérer l'image du champ personnalisé "listing_image_url"
            $custom_image_url = get_post_meta(get_the_ID(), 'listing_image_url', true);

            if (!empty($custom_image_url)) {
                $image_url = $custom_image_url;
            } else {
                // Si aucune image personnalisée n'est définie, utiliser l'image mise en avant
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            }

            $ref_link = get_permalink();
        ?>
            <a href="<?php echo esc_url($ref_link); ?>">
                <div class="ref-item ">
                    <div class="ref-image" style="background-image: url('<?php echo esc_url($image_url); ?>');">
                        <div class="ref-overlay flex-col">
                            <div class="ref-description">
                                <?php
                                $excerpt = get_the_excerpt(); // Récupère l'excerpt.
                                echo wp_trim_words($excerpt, 15, '...'); // Limite à 3 mots ou vous pouvez adapter la longueur.
                                ?>
                            </div>
                            <div class="ref-title">

                                <p class="view-project">Voir le projet</p>
                            </div>
                        </div>
                    </div>
                    <h2 class="project-title"><?php the_title(); ?></h2>
                    <!-- <div class="project-tags"> a voir pour les tags si on les utilises
                    <?php echo get_the_term_list(get_the_ID(), 'type-reference', '<span class="tag">', '</span><span class="tag">', '</span>'); ?>
                </div> -->
                </div>
            </a>
        <?php
        endwhile;
        ?>
    </div>

    <style>
        .categories {

            padding-top: 145px;
        }

        .category-filter {
            padding: 10px;
            padding-left: 30px;
            padding-right: 30px;
            border-radius: 50px;
            border: 2px solid #1e1e1e;
            background-color: white !important;
            color: #1e1e1e;
            transition: all 0.5s;
        }

        .category-filter:hover {
            color: #1e1e1e !important;
        }

        .category-filter.active {
            background-color: #1E1E1E !important;
            /* Change la couleur de fond */
            color: #fff !important;
            /* Change la couleur du texte */
            border: 1px solid white !important;

            /* Ajouter une bordure pour indiquer la sélection */
        }

        .page-template-template-remonte-ref-clients {
            background-color: #1E1E1E;
            color: white;
        }

        .refs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            padding: 20px;
            max-width: 70vw;
            margin: auto;
        }

        @media (max-width: 1024px) {
            .refs-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .refs-grid {
                grid-template-columns: 1fr;
            }
        }

        .ref-item {
            position: relative;
            background-color: white;
            overflow: hidden;
            transition: transform 0.3s ease;
            height: 100%;
            border-radius: 12px;
        }

        .ref-image {
            width: 100%;
            padding-top: 80%;
            background-size: auto;
            background-position: center;
            background-repeat: no-repeat;
            transition: all 0.6s ease;
            height: 100%;
        }

        .ref-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(30, 30, 30, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.5s ease;
            height: 100%;
            /* Prend toute la hauteur du parent */
            width: 100%;
            border-radius: 26px;
        }

        .ref-item:hover .ref-overlay {
            opacity: 1;
        }

        .ref-title {
            display: flex;
            justify-content: start;
            width: 70%;
            position: absolute;
            bottom: 10px;
        }

        .ref-title h2 {
            color: white;
            font-size: 1.5rem;
            margin: 0;
            text-align: start;
        }

        .ref-title:hover {
            text-decoration: underline;
        }

        .view-project {
            color: white;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
            text-align: start;

        }

        .view-project::after {
            content: "";
            display: inline-block;
            width: 24px;
            height: 24px;
            background-image: url("<?php echo get_template_directory_uri() . '/images/svg/Flèche-blanche-petite.svg'; ?>");
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            margin-left: 5px;
            top: 5px;
            position: relative;

            /* Ajoutez cette ligne pour tester */
        }

        .ref-item:hover .ref-image {
            transform: scale(1.05);
        }

        .ref-description {
            width: 70%;
        }

        .project-title {
            text-align: start;
            padding-left: 5px;
            font-size: 1.2rem;
            margin: 35px 0;
        }

        .project-tags {
            text-align: center;
        }

        .tag {
            background-color: #e0e0e0;
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 26px;
            display: inline-block;
            font-size: 26px;
        }
    </style>

<?php
else :
    echo '<p>Aucune référence client trouvée.</p>';
endif;

wp_reset_postdata();
get_footer();
