<?php

/**
 * Template Name: Blog Template
 *
 * @package passedevant
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="blog-hero">
        <div class="flex flex-col gap-8 container mt-20 lg:mt-0 lg:w-1/2 lg:h-full lg:ms-52">
            <h1 class="text-5xl text-white">Le Blog de l'actu SEO</h1>
            <div class="blog-hero_form_container container text-white flex flex-col gap-4>
                <p class=" text-2xl">Newsletter</p>
                <p class="text-xl">Inscrivez-vous et recevez les dernières actualités digitales directement dans votre boîte mail.</p>
                <form class="blog-newsletter-form">
                    <?php echo do_shortcode('[wpforms id="57"]'); ?>
                </form>
            </div>
        </div>
    </div>
    <div class="categories mt-8">
        <div class="container mx-auto flex justify-center gap-4">
            <button class="category-filter bg-purple-600 text-white p-2 rounded">Tout</button>
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<button class="category-filter bg-gray-200 text-black p-2 rounded" data-category="' . $category->slug . '">' . $category->name . '</button>';
            }
            ?>
        </div>
    </div>
    <div class="container mx-auto ">

        <!-- Boucle pour afficher les articles de blog -->
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post border rounded-lg overflow-hidden shadow-lg'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail block">
                                <?php the_post_thumbnail('full', ['class' => 'w-full']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-4">
                            <header class="entry-header">
                                <h2 class="entry-title text-xl font-semibold">
                                    <a href="<?php the_permalink(); ?>" class="text-black no-underline hover:underline">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-content -->
                            <footer class="entry-footer mt-4">
                                <a href="<?php the_permalink(); ?>" class="read-more text-blue-600 hover:text-blue-800">Lire la suite</a>
                            </footer><!-- .entry-footer -->
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->
                <?php endwhile; ?>
            </div><!-- .grid -->
            <!-- Pagination -->
            <div class="pagination mt-8">
                <?php
                the_posts_pagination(array(
                    'prev_text' => __('Précédent', 'passedevant'),
                    'next_text' => __('Suivant', 'passedevant'),
                ));
                ?>
            </div>
        <?php else : ?>
            <p><?php _e('Aucun article trouvé.', 'passedevant'); ?></p>
        <?php endif; ?>
    </div><!-- .container -->
</main><!-- #main -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionner tous les boutons de filtre
        const filters = document.querySelectorAll('.category-filter');
        // Ajouter un écouteur d'événement sur chaque bouton
        filters.forEach(filter => {
            filter.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                // Sélectionner tous les articles
                const posts = document.querySelectorAll('.blog-post');
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
<?php

get_footer();
?>