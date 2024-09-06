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

		<div class="page-content flex flex-col justify-center items-center gap-12 h-full">
			<header class="page-header">
				<h1 class="page-title invisible"><?php esc_html_e('Not Found', 'passedevant'); ?></h1>
			</header><!-- .page-header -->
			<p class="gradient-text_title text-8xl">Oups vous êtes perdu ? </p>
			<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

			<dotlottie-player src="https://lottie.host/d64ce645-eaf5-4d23-9701-2cb47339cc51/pCnT4ubFhJ.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
			<div class="container">
				<p class="text-4xl">Choisissez votre chemin</p>
			</div>
			<div class=" flex w-3/4 justify-around gap-16 mb-24 px-48">
				<div class=" notFoundCard border-black border-2 rounded-lg p-10 flex flex-col justify-center items-center gap-4 w-1/2">
					<p>Vous avez besoin d'un site et où de référencement naturelle, c'est par ici</p>
					<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
						<div class="wp-block-button secondary-button">
							<a class="wp-block-button__link wp-element-button" href="/">Nos services</a>
						</div>

					</div>
				</div>
				<div class="notFoundCard border-black border-2 rounded-lg p-10 flex flex-col justify-center items-center gap-4 w-1/2">
					<p>Ne perdez pas de temps et prenez tout de suite rendez-vous avec nous.</p>
					<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
						<div class="wp-block-button secondary-button">
							<a class="wp-block-button__link wp-element-button" href="/">Contactez-nous</a>
						</div>
					</div>
				</div>
			</div>






		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
