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
			<h2><span class="gradient-text">Collaborons ensemble</span></h2>
			<p>
				Vous souhaitez faire connaissance avec nous et en savoir plus sur nos expertises ?
				discutons ensemble de votre projet et de votre talent à faire connaître sur Google !
			</p>
		</div>
		<div class="col button">

			<a href="/contact" class="footer_cta-button">
				<span class="cta-button-text">Contact</span>
			</a>
		</div>
	</div>

	<div class="footer-widgets">
		<?php
		$footer_columns = get_theme_mod('footer_columns', 4);
		for ($i = 1; $i <= $footer_columns; $i++): ?>
			<div class="footer-column">
				<?php if (is_active_sidebar('footer-' . $i)): ?>
					<?php dynamic_sidebar('footer-' . $i); ?>
				<?php endif; ?>
			</div>
		<?php endfor; ?>
	</div>
	<div class="site-info">
		<?php esc_html_e('Fait avec ❤️ par Passedevant', 'passedevant'); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>