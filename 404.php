<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package passedevant
 */

get_header();
?>

<main id="primary" class="site-main ">

	<section class="error-404 not-found">

		<div class="page-content flex flex-col justify-center items-center gap-12">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e('Perdu(e) ?', 'passedevant'); ?></h1>
			</header><!-- .page-header -->
			<p>Il semble que rien n'ait été trouvé à cet endroit.
			</p>
			<p>Cliquez ici pour revenir à l'accueil</p>
			<img width="260px" src="<?php echo get_template_directory_uri() . '/images/404.jpg'; ?>" alt="">

			<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
				<div class="wp-block-button secondary-button">
					<a class="wp-block-button__link wp-element-button" href="/">Revenir à l'accueil</a>
				</div>

			</div>





		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
