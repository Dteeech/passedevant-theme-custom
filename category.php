<?php

/**
 * A Simple Category Template
 */

get_header(); ?>



<main id="primary" class="site-main">
    <div class="blog-hero flex flex-col md:flex-row justify-center items-center">
        <div class="flex flex-col container lg:w-1/4 lg:h-full lg:ms-52 mt-28">
            <h1 class="text-5xl text-white">Le Blog de l'actu SEO</h1>
            <div class=" container text-white flex flex-col gap-4 items-center justify-center">
                <p class="text-xl">Petit texte à propos du blog</p>

            </div>
        </div>
        <div class="blog-hero_newsletter_form flex flex-col container lg:w-1/3 lg:h-full lg:ms-52 mt-28">

            <div class="blog-hero_form_container container text-white flex flex-col gap-4 flex-wrap">

                <p class="!text-2xl">Newsletter</p>
                <p class="text-xl">Inscrivez-vous et recevez les dernières actualités digitales directement dans votre boîte mail.</p>
                <form class="blog-newsletter-form">
                    <?php echo do_shortcode('[wpforms id="57"]'); ?>
                </form>
            </div>
        </div>
    </div>
    <div class="categories mt-8">
        <div class="container mx-auto flex justify-center gap-4">
            <a href="/blog" class="category-filter">Tout</a>
            <?php
            $current_category = get_queried_object();
            $args = array(
                'taxonomy' => 'category',
                'orderby' => 'name',
                'order' => 'DESC',
            );
            $categories = get_terms($args);
            foreach ($categories as $category) {
                $active_class = ($current_category->term_id == $category->term_id) ? 'active' : '';
                $category_link = get_category_link($category->term_id);
                echo '<a href="' . esc_url($category_link) . '" class="category-filter ' . $active_class . '" data-category="' . $category->slug . '">' . $category->name . '</a>';
            }
            ?>
        </div>
    </div>
    <div class="container mx-auto ">

        <!-- Boucle pour afficher les articles de blog -->
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post border overflow-hidden shadow-lg'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail block">
                                <?php the_post_thumbnail('full', ['class' => 'w-full']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-4">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class="text-black no-underline hover:underline">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </header><!-- .entry-header -->
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->
                <?php endwhile; ?>
            </div><!-- .grid -->
            <?php
            $category_custom_text = get_term_meta(get_queried_object()->term_id, 'category_custom_text', true);

            if (!empty($category_custom_text)) {
                echo '<div class="category-custom-text">' . wp_kses_post(wpautop($category_custom_text)) . '</div>';
            }
            ?>
            <div class="pagination mt-8">
                <?php
                the_posts_pagination(array(
                    'prev_text' => __('←', 'passedevant'),
                    'next_text' => __('→', 'passedevant'),
                ));
                ?>
            </div>
        <?php else : ?>
            <p><?php _e('Aucun article trouvé.', 'passedevant'); ?></p>
        <?php endif; ?>
    </div><!-- .container -->
</main><!-- #main -->

<style>
    .archive .pagination .navigation .nav-links {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 52px 0;
    }

    .archive .pagination .navigation .nav-links .page-numbers {
        padding: 10px;
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 50px;
        border: 2px solid #1e1e1e;
        background-color: white;
        color: #1e1e1ea5;
        transition: all 0.5s;
        margin: 0px 30px;
    }

    /* Style des boutons au survol */
    .archive .pagination .navigation .nav-links .page-numbers:hover {
        background-color: #1e1e1e;
        color: white;
    }

    /* Style du bouton correspondant à la page active */
    .archive .pagination .navigation .nav-links .page-numbers.current {
        background-color: #1e1e1e;
        /* Fond noir */
        color: white;
        /* Texte blanc */
        border: 2px solid #1e1e1e;
    }

    /* Style des boutons Précédent et Suivant */
    .archive .pagination .navigation .nav-links .page-numbers.prev,
    .archive .pagination .navigation .nav-links .page-numbers.next {
        padding: 10px;
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 50px;
        border: 2px solid #1e1e1e;
        background-color: white;
        color: #1e1e1ea5;
        transition: all 0.5s;
        margin: 0px 30px;
    }

    .archive .pagination .navigation .nav-links .page-numbers.prev:hover,
    .archive .pagination .navigation .nav-links .page-numbers.next:hover {
        background-color: #1e1e1e;
        color: white;
    }

    .archive .blog-post h2 {
        font-size: 20px !important;
    }

    @media (max-width: 768px) {
        .blog-hero_newsletter_form {
            margin: 50px 0;
        }

        .blog-hero_newsletter_form .wpforms-container.inline-fields .wpforms-field-container {
            width: calc(100%) !important;
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionner tous les boutons de filtre
        const filters = document.querySelectorAll('.category-filter');
        // Ajouter un écouteur d'événement sur chaque bouton
        filters.forEach(filter => {
            filter.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                // Sélectionner tous les articles
                const posts = document.querySelectorAll('.archive-post');
                // Si la catégorie sélectionnée est "Tout", afficher tous les articles
                if (category === null) {
                    posts.forEach(post => {
                        post.style.display = 'block';
                    });
                } else {
                    // Sinon, afficher uniquement les articles de la catégorie sélectionnée
                    posts.forEach(post => {
                        if (post.classList.contains('category-' + category)) {
                            post.style.display = 'block';
                        } else {
                            post.style.display = 'none';
                        }
                    });
                }
                // Optionnel : Modifier le style des boutons actifs
                filters.forEach(f => f.classList.remove('bg-purple-600', 'text-white'));
                this.classList.add('bg-purple-600', 'text-white');
            });
        });
    });
</script>

<?php get_footer(); ?>