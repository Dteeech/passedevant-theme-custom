<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	// Vérifier la couleur de l'en-tête
	if (!isset($header_color)) {
		$header_color = get_post_meta(get_the_ID(), '_header_color', true);
	}
	echo "<!-- Header color: " . $header_color . " -->";
	// Si aucune couleur n'est spécifiée dans les meta données, utiliser "dark-light" par défaut
	if (!$header_color) {
		$header_color = 'dark-light';
	}
	$header_class = ($header_color === 'dark') ? 'header-dark' : (($header_color === 'dark-light') ? 'header-dark-light' : 'header-light');

	// Définir les classes et l'image du bouton CTA en fonction de la couleur de l'en-tête

	if ($header_color === 'dark') {
		$cta_classes = 'bg-white text-black border-black border-slate-50';
		$cta_image = 'arrow-right-rounded-white.svg';
	} elseif ($header_color === 'dark-light') {
		$cta_classes = 'bg-gradient-to-r from-blue-500 to-pink-500 text-white';
		$cta_image = 'arrow-right-rounded.svg';
	} else {
		$cta_classes = 'bg-slate-700 text-white border-white';
		$cta_image = 'arrow-right-rounded.svg';
	}

	?>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e('Skip to content', 'passedevant'); ?></a>
		<div id="header-container">
			<header id="masthead" class="site-header <?php echo esc_attr($header_class); ?>">
				<?php
				$logo_light = get_theme_mod('header_logo_light');
				$logo_dark = get_theme_mod('header_logo_dark');
				$default_logo_id = get_theme_mod('custom_logo');
				$default_logo_url = wp_get_attachment_image_url($default_logo_id, 'full');

				// Définir l'URL du logo en fonction de la couleur du header
				if ($header_color === 'dark' || $header_color === 'dark-light') {
					$logo_url = $logo_light;
				} else {
					$logo_url = $logo_dark;
				}
				// Si aucun logo personnalisé n'est défini, utiliser le logo par défaut
				if (! $logo_url) {
					$logo_url = $default_logo_url ? $default_logo_url : get_template_directory_uri() . '/assets/images/default-logo.png';
				}

				echo "<!-- Light logo: " . $logo_light . " -->";
				echo "<!-- Dark logo: " . $logo_dark . " -->";
				echo "<!-- Default logo: " . $default_logo_url . " -->";
				?>
				<div id="site-navigation" class="flex flex-row align-top underline--gradient">
					<nav class="main-navigation">

						<a id="logo" class="" href="/">
							<img src="<?php echo esc_url($logo_url); ?>" alt="Logo">
						</a>
						<div class="container flex main-navigation_menu">
							<button class="menu-toggle " aria-controls="primary-menu"
								aria-expanded="false"><?php esc_html_e('Primary Menu', 'passedevant'); ?></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id' => 'primary-menu',
									'container' => 'nav',
								)
							);
							?>
						</div>
					</nav><!-- #site-navigation -->
					<div class="header_nav-contact wp-block-buttons <?php if (isset($header_class) && $header_class === 'header-light') {
																		echo 'secondary-button';
																	} elseif ($header_class === 'header-dark-light') {
																		echo 'gradient-button';
																	} else {
																		echo 'primary-button';
																	} ?> is-layout-flex wp-block-buttons-is-layout-flex">
						<div class="wp-block-button  ">
							<a href="/contact" class="wp-block-button__link wp-element-button "><?php esc_html_e('Contact'); ?></a>
						</div>
					</div>
				</div>
			</header><!-- #masthead -->
		</div>