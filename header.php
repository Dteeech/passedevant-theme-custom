<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="site-header sticky-header">
		<div class="menu-wrapper flex justify-center">
			<div id="logo">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

				if (has_custom_logo()) {
					echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
				} else {
					echo '<h1>' . get_bloginfo('name') . '</h1>';
				}
				?>
			</div>
			<ul class="main-menu">
				<!-- Item Expertises avec un méga-menu -->
				<li class="menu-item menu-classic">
					<a href="#">Expertises</a>
					<div class="mega-menu">
						<!-- Colonne gauche avec les catégories -->
						<ul class="category-list">

							<li class="category-item menu-item menu-seo" data-menu="seo">
								<a href="/seo">SEO
									<p>Lorem ipsum</p>
								</a>
							</li>


							<li class="category-item menu-item menu-dev" data-menu="creation">
								<a href="/creation-sites">Création de site

									<p>Lorem ipsum</p>
								</a>
							</li>


							<li class="category-item menu-item menu-classic" data-menu="sea">
								<a href="/sea">SEA

									<p>Lorem ipsum</p>
								</a>
							</li>


							<li class="category-item menu-item" data-menu="formations">
								<a href="/formations">Formations
									<p>Lorem ipsum</p>

								</a>
							</li>

						</ul>

						<!-- Colonne droite avec les liens de chaque catégorie -->
						<div class="category-content">
							<div class="menu-content" id="seo">
								<ul>
									<li class="menu-item menu-seo"><a href="/audit-seo">Audit SEO</a></li>
									<li class="menu-item menu-seo"><a href="/redaction-web">Rédaction web</a></li>
									<li class="menu-item menu-seo"><a href="/refonte-seo">Refonte SEO</a></li>
									<li class="menu-item menu-seo"><a href="/accompagnements">Accompagnement SEO</a></li>
									<li class="menu-item menu-seo"><a href="/seo-local">SEO Local</a></li>
								</ul>
							</div>

							<div class="menu-content" id="creation">
								<ul>
									<li class="menu-item menu-dev"><a href="/site-vitrine">Site Vitrine</a></li>
									<li class="menu-item menu-dev"><a href="/e-commerce">Site E-commerce</a></li>
									<li class="menu-item menu-dev"><a href="/blog">Blog</a></li>
								</ul>
							</div>

							<div class="menu-content" id="sea">
								<ul>
									<li class="menu-item"><a href="/404">Rien pour le moment</a></li>
								</ul>
							</div>

							<div class="menu-content " id="formations">
								<ul>
									<li class="menu-item"><a href="/404">Rien pour le moment</a></li>
								</ul>
							</div>
						</div>
					</div>
				</li>

				<!-- Menus normaux -->
				<li class="menu-item"><a href="/agence">L'agence</a></li>
				<li class="menu-item"><a href="/references">Références</a></li>
				<li class="menu-item"><a href="/blog">Blog</a></li>
			</ul>
		</div>
	</header>




	<style>
		/* Style de base */
		.menu-wrapper {
			position: relative;
			justify-content: space-around;
			background-color: #1E1E1E;
			padding: 10px;
			padding: 20px;
			border-radius: 12px;
			width: 815px;
		}

		.main-menu {
			list-style: none;
			display: flex;
			padding: 0;
			margin: 0;
			align-items: center;
		}

		.main-menu .menu-item {
			position: relative;
			padding: 15px 20px;
			cursor: pointer;
			font-size: 20px;
		}

		.main-menu .menu-item a {
			text-decoration: none;
			color: #fff;
			font-weight: bold;
			font-size: 20px;
		}

		.mega-menu {
			position: absolute;
			top: 100%;
			left: 0;
			width: 600px;
			display: none;
			background-color: #1E1E1E !important;
			box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);

			z-index: 1000;
			display: flex;
			border-radius: 12px;
		}

		.mega-menu {
			display: none;
			width: 524px;
		}

		/* Afficher le méga-menu au survol de "Expertises" */
		.menu-item:hover .mega-menu {
			display: flex;
			cursor: pointer;
		}

		.category-list {
			width: 35%;
			padding: 20px;
		}

		.category-list .category-item::after {
			content: "→";
			position: absolute;
			right: -10px;
			bottom: 15px;
			transform: translateX(-10px);
			font-size: 0.8em;
			opacity: 0;
			transition: all 0.3s ease-in-out;
			/* Transition sur toutes les propriétés avec easing fluide */
		}

		/* Au survol : la flèche apparaît et se déplace vers la position d'origine */
		.category-list .category-item:hover::after {
			opacity: 1;
			transform: translateX(0);
		}

		.category-list .category-item {
			padding: 10px 0;
			cursor: pointer;
			font-weight: bold;
			color: white;


		}

		.category-list .category-item a {
			font-size: 20px;
		}

		.category-list .category-item p {
			color: white;
			font-size: small;
			font-weight: normal;
		}


		.category-content {
			width: 70%;
			padding: 20px 20px 20px 35px;
			background-color: rgba(0, 0, 0, 0.6);
			border-radius: 0 12px 12px 0;
		}

		.menu-content {
			display: none;
		}

		.menu-content ul {
			list-style: none;
			padding: 0;
			margin: 0;
		}

		.menu-content ul li {
			margin-bottom: 10px;
		}

		.menu-content ul li a {
			text-decoration: none;
			color: #555;
			font-size: 14px;
		}

		/* Afficher le contenu actif au survol */
		.category-item:hover~.category-content .menu-content {
			display: none;
		}

		.category-item[data-menu="seo"]:hover~.category-content #seo,
		.category-item[data-menu="creation"]:hover~.category-content #creation,
		.category-item[data-menu="sea"]:hover~.category-content #sea,
		.category-item[data-menu="formations"]:hover~.category-content #formations {
			display: block;
		}

		.menu-dev a:hover {
			color: transparent !important;
			/* Le texte est transparent pour que le dégradé soit visible */

			background: linear-gradient(90deg,
					#05a9cf 0%,
					#95dfd2 23%,
					#02febd 48%,
					#029679 66%,
					#02a382 72.87%,
					#02b08a 79.75%,
					#044876 92.5%) !important;
			background-clip: text !important;
			-webkit-background-clip: text !important;
			/* Nécessaire pour certains navigateurs */
		}

		.menu-dev a::after {
			content: "" !important;
			position: absolute !important;
			left: 0 !important;
			bottom: -2px !important;
			width: 100% !important;
			height: 2px !important;
			background: linear-gradient(90deg, #05a9cf 0%, #95dfd2 23%, #02febd 48%, #029679 66%, #02a382 72.87%, #02b08a 79.75%, #044876 92.5%) !important;
			transform: scaleX(0) !important;
			transform-origin: left !important;
			transition: transform 0.5s ease-out !important;
		}


		.menu-seo a:hover {
			color: transparent !important;
			/* Le texte est transparent pour que le dégradé soit visible */

			background: linear-gradient(90deg,
					#0524a7 0%,
					#df22f0 26.5%,
					#fda9c0 54.5%,
					#430a8b 86.5%) !important;
			background-clip: text !important;
			-webkit-background-clip: text !important;
			/* Nécessaire pour certains navigateurs */
		}

		.menu-seo a::after {
			content: "" !important;
			position: absolute !important;
			left: 0 !important;
			bottom: -2px !important;
			width: 100% !important;
			height: 2px !important;
			background: linear-gradient(90deg, #0524a7 0%, #df22f0 26.5%, #fda9c0 54.5%, #430a8b 86.5%) !important;
			transform: scaleX(0) !important;
			transform-origin: left !important;
			transition: transform 0.5s ease-out !important;
		}

		.menu-classic a:hover {
			color: transparent;
			background: linear-gradient(90deg,
					#05a9cf 0%,
					#5cb6e5 17.5%,
					#93baec 37%,
					#edc3df 57%,
					#f33585 74.5%);
			background-clip: text;
			-webkit-background-clip: text;
		}

		.menu-classic a::after {
			content: "";
			position: absolute;
			left: 0;
			bottom: -2px;
			width: 100%;
			height: 2px;
			background: linear-gradient(90deg, #05a9cf 0%, #5cb6e5 17.5%, #93baec 37%, #edc3df 57%, #f33585 74.5%);
			transform: scaleX(0);
			transform-origin: left;
			transition: transform 0.5s ease-out;
		}

		.menu-formations a:hover {
			background: linear-gradient(to right,
					#b6269d 0%,
					#fe48a4 33%,
					#ff36e4 59%,
					#f71729 86.5%);
			-webkit-background-clip: text;
			color: transparent;
		}

		/* Style du soulignement uniquement pour les éléments de premier niveau */
		.main-menu>.menu-item>a:hover::after {
			transform: scaleX(1) !important;
		}

		/* Retirer le soulignement pour les sous-menus */
		.mega-menu .menu-item a::after {
			content: none;
		}
	</style>

	</header>