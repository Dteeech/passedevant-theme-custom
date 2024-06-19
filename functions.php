<?php
/**
 * passedevant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package passedevant
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function passedevant_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on passedevant, use a find and replace
		* to change 'passedevant' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'passedevant', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'passedevant' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'passedevant_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'passedevant_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function passedevant_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'passedevant_content_width', 640 );
}
add_action( 'after_setup_theme', 'passedevant_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function passedevant_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'passedevant' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'passedevant' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'passedevant_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function passedevant_scripts() {
	wp_enqueue_style( 'passedevant-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'passedevant-style', 'rtl', 'replace' );

	wp_enqueue_script( 'passedevant-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'passedevant_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function my_shortcode($atts){
	$a = shortcode_atts( array(
		'nom' => 'valeur1',
		'mot' => 'valeur2'
	), $atts);

	$contenu = "<div>
		<h2>Les infos de l'auteur :</h2>
		<p>Le nom de l'auteur : <strong>" . $a['nom'] . "</strong></p>
		<p>Le mot de l'auteur :  <strong>" . $a['mot'] . " </strong></p>
	</div>";
	
	return $contenu;
}

add_shortcode('meta', 'my_shortcode');

/**
 * Fonction qui gère la possibilité d'ajouter une classe à une image
 * va notamment être récupérée pour changer le style du header en fonction du
 * background
 * 
 */

 function validate_logo_url($logo_url) {
    // Vérifiez si l'URL du logo est valide et si le fichier existe
    return ($logo_url && file_exists(str_replace(home_url('/'), ABSPATH, $logo_url))) ? $logo_url : false;
}

function customize_header_logos($wp_customize) {
    $wp_customize->add_section('header_settings', array(
        'title'    => __('Header Settings', 'mytheme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('header_logo_light', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo_light', array(
        'label'    => __('Light Logo', 'mytheme'),
        'section'  => 'header_settings',
        'settings' => 'header_logo_light',
    )));

    $wp_customize->add_setting('header_logo_dark', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo_dark', array(
        'label'    => __('Dark Logo', 'mytheme'),
        'section'  => 'header_settings',
        'settings' => 'header_logo_dark',
    )));
}
add_action('customize_register', 'customize_header_logos');


/**
 * 
 * Fonction pour enregister une métabox personnalisée
 * 
 */

 function add_header_color_metabox() {
	$post_type = array('post', 'page', 'custom_post_type');
	
	add_meta_box(
		'header_color_metabox', // ID de la metabox
        'Header Color', // Titre de la metabox
        'render_header_color_metabox', // Fonction de rappel pour afficher la métabox
        $post_type, // Type de publication où afficher la métabox
        'side', // Contexte (où la metabox apparaîtra)
        'default' // Priorité
	);
 }

 add_action('add_meta_boxes', 'add_header_color_metabox' );


 function render_header_color_metabox($post) {
    // Récupère la valeur actuelle de l'option
    $header_color = get_post_meta($post->ID, '_header_color', true);
    wp_nonce_field('save_header_color_metabox', 'header_color_metabox_nonce');
    ?>
    <label>
        <input type="radio" name="header_color" value="light" <?php checked($header_color, 'light'); ?> /> Light
    </label><br />
    <label>
        <input type="radio" name="header_color" value="dark" <?php checked($header_color, 'dark'); ?> /> Dark
    </label>
    <?php
}

function save_header_color_metabox($post_id) {
    // Vérifie le nonce pour la sécurité
    if (!isset($_POST['header_color_metabox_nonce']) || !wp_verify_nonce($_POST['header_color_metabox_nonce'], 'save_header_color_metabox')) {
        return;
    }

    // Vérifie les autorisations de l'utilisateur
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Sauvegarde la valeur du bouton radio
    if (isset($_POST['header_color'])) {
        update_post_meta($post_id, '_header_color', sanitize_text_field($_POST['header_color']));
    } else {
        delete_post_meta($post_id, '_header_color');
    }
}
add_action('save_post', 'save_header_color_metabox');


