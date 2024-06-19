<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package passedevant
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	$header_color = get_post_meta(get_the_ID(), '_header_color', true);
	$header_class = ($header_color === 'dark') ? 'header-dark' : 'header-light';
	?>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e('Skip to content', 'passedevant'); ?></a>

		<header id="masthead" class="site-header <?php echo esc_attr($header_class); ?>">
			<?php
			$logo_light = get_theme_mod('header_logo_light');
			$logo_dark = get_theme_mod('header_logo_dark');
			$logo_url = ($header_color === 'dark') ? $logo_light : $logo_dark;
			?>

			<nav id="site-navigation" class="main-navigation">
				<?php if ($logo_url): ?>
					<a href="/"> <img id="logo" src="<?php echo esc_url($logo_url); ?>" alt="Logo"> </a>
				<?php else: ?>
					<a href="/"> <img id="logo" src="<?php echo esc_url(get_template_directory_uri() . '/app/public/wp-content/themes/passedevant/images/logo.png'); ?>"
						alt="Logo"> </a>
				<?php endif; ?>

				<button class="menu-toggle" aria-controls="primary-menu"
					aria-expanded="false"><?php esc_html_e('Primary Menu', 'passedevant'); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id' => 'primary-menu',
					)
				);
				?>

				<button class="menu-CTA" aria-controls="primary-menu"
					aria-expanded="false"><?php esc_html_e('Contact', 'passedevant'); ?></button>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->