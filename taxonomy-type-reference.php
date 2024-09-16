<?php

get_header();



$current_category = get_queried_object();

$args = array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-ref-client.php',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
);
if (!empty($current_category)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'type-reference', // Le slug de votre taxonomie
            'field'    => 'slug',
            'terms'    => $current_category->slug,
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
            <a href="<?php echo site_url('/references'); ?>" class="category-filter <?php if (is_archive() && !is_tax()) echo 'active'; ?>">Tout</a>
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
                $active_class = ($current_category && $current_category->term_id == $category->term_id) ? 'active' : '';

                // Générer l'URL avec le paramètre filter
                $category_link = site_url('/references/' . $category->slug);

                echo '<a href="' . esc_url($category_link) . '" class="category-filter ' . $active_class . '" data-category="' . $category->slug . '">' . $category->name . '</a>';
            }
            ?>
        </div>
    </div>

    <!-- Boucle pour afficher les références clients -->
    <div class="refs-grid">
        <?php

        while ($ref_query->have_posts()) : $ref_query->the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Image à la une
            $ref_link = get_permalink();
        ?>
            <a href="<?php echo esc_url($ref_link); ?>">
                <div class="ref-item">
                    <div class="ref-image" style="background-image: url('<?php echo esc_url($image_url); ?>');">
                        <div class="ref-overlay">
                            <div class="ref-title">

                                <p class="view-project">Voir le projet</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="project-title"><?php the_title(); ?></h3>
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

            margin: 145px 0 45px 0;
        }

        .tax-type-reference .category-filter {
            padding: 10px;
            padding-left: 30px;
            padding-right: 30px;
            border-radius: 50px;
            border: 2px solid #1e1e1e;
            background-color: white !important;
            color: #1e1e1e;
            transition: all 0.5s;
        }

        .category-filter.active {
            background-color: #1E1E1E !important;
            /* Change la couleur de fond */
            color: #fff !important;
            /* Change la couleur du texte */
            border: 1px solid white !important;

            /* Ajouter une bordure pour indiquer la sélection */
        }

        .tax-type-reference {
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
            background-color: transparent;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .ref-image {
            width: 100%;
            padding-top: 150%;
            background-size: cover;
            background-position: center;
            transition: all 0.6s ease;
            border-radius: 26px;
            max-height: 500px;
        }

        .ref-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .ref-item:hover .ref-overlay {
            opacity: 1;
        }

        .ref-title h2 {
            color: white;
            font-size: 1.5rem;
            margin: 0;
        }

        .view-project {
            color: white;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;

        }

        .ref-item:hover .ref-image {
            transform: scale(1.05);
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
