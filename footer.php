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

<footer id="colophon" class="site-footer"
	style="background-color: <?php echo get_theme_mod('footer_bg_color', '#000000'); ?>;">

	<div class="footer_cta-section">
		<div class="col content">
			<h2><span class="gradient-text ">Collaborons ensemble</span></h2>
			<p>
				Vous souhaitez faire connaissance avec nous et en savoir plus sur nos expertises ?
				discutons ensemble de votre projet et de votre talent à faire connaître sur Google !
			</p>
		</div>
		<div class="col button">

			<a href="/contact" class="cta">
				<span class="cta-button-text">Contact</span>
			</a>
		</div>
	</div>

	<div class="footer-widgets sm:mt-5 lg:mt-52">
		<?php
		$footer_columns = get_theme_mod('footer_columns', 4);
		for ($i = 1; $i <= $footer_columns; $i++): ?>
			<div class="footer-column underline--gradient">
				<?php if (is_active_sidebar('footer-' . $i)): ?>
					<?php dynamic_sidebar('footer-' . $i); ?>
				<?php endif; ?>
			</div>
		<?php endfor; ?>
		<div class="wrapper flex">
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/google-analytics-logo.webp' ?>" alt="Logo Google analytics"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/google-my-business-logo.webp' ?>" alt="Logo google my business"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() .'/images/logos-footer/google-tag-manager-logo.webp' ?>" alt="Logo google tag manager"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/seranking.webp' ?>" alt="Logo seranking"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/logo-wordpress.webp' ?>" alt="Logo WordPress"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/logo-shopify.webp' ?>" alt="Logo Shopify"></div>
			<div class=""><img src="<?php echo get_template_directory_uri() . '/images/logos-footer/logo-prestashop.webp' ?>" alt="Logo Prestashop"></div>
		</div>
	</div>
	<div class="site-info text-">
		<p><?php esc_html_e('Fait avec ❤️ par Passedevant', 'passedevant'); ?> - <a href="/mentions-legales">Mentions légales</a></p>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); 

?>

</body>

</html>