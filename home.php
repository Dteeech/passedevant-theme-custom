<?php

/**
 * Template Name: Blog Template
 *
 * @package passedevant
 */

get_header();
?>

<main id="primary" class="site-main">
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
        <h1 class="text-5xl text-black mb-8 ">Blog</h1>

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

<?php

get_footer();
?>