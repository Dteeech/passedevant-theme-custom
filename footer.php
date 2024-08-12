<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package passedevant
 */

?>

<footer id="colophon" class="site-footer" style="border-top:1px solid white; background-color: <?php echo get_theme_mod('footer_bg_color', '#1e1e1e'); ?>;">


	<div class="footer-widgets sm:mt-5">
		<?php
		$footer_columns = get_theme_mod('footer_columns', 4);
		for ($i = 1; $i <= $footer_columns; $i++) : ?>
			<div class="footer-column underline--gradient">
				<?php if (is_active_sidebar('footer-' . $i)) : ?>
					<?php dynamic_sidebar('footer-' . $i); ?>
				<?php endif; ?>
			</div>
		<?php endfor; ?>
		<div class="wrapper flex mt-20 mb-20">
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/google-analytics-logo.webp' ?>" alt="Logo Google analytics"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/google-my-business-logo.webp' ?>" alt="Logo google my business"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/google-tag-manager-logo.webp' ?>" alt="Logo google tag manager"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/seranking.webp' ?>" alt="Logo seranking"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/logo-wordpress.webp' ?>" alt="Logo WordPress"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/logo-shopify.webp' ?>" alt="Logo Shopify"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/logo-prestashop.webp' ?>" alt="Logo Prestashop"></div>
		</div>
	</div>
	<div class="site-info text-">
		<p><?php esc_html_e('Fait avec ❤️ par Passedevant', 'passedevant'); ?> - <a href="/mentions-legales">Mentions légales</a></p>
	</div><!-- .site-info -->
	<button id="back-to-top" title="Go to top">↑</button>
</footer><!-- #colophon -->
<script>
	// Affiche le bouton lorsque l'utilisateur fait défiler vers le bas de 200px
	window.onscroll = function() {
		const backToTopButton = document.getElementById("back-to-top");
		if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
			backToTopButton.style.display = "block";
		} else {
			backToTopButton.style.display = "none";
		}
	};

	// Remonte en haut de la page lorsque l'utilisateur clique sur le bouton
	document.getElementById("back-to-top").addEventListener("click", function() {
		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		});
	});
</script>
</div><!-- #page -->

<?php wp_footer();

?>


</body>

</html>