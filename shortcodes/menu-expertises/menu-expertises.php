<?php
function custom_homepage_content_shortcode()
{
    $json_file_path = get_template_directory() . '/shortcodes/menu-expertises/data.json';

    if (!file_exists($json_file_path)) {
        return 'JSON file not found at ' . $json_file_path;
    }

    $json_data = file_get_contents($json_file_path);

    if ($json_data === false) {
        return 'Unable to read JSON file.';
    }

    $content_data = json_decode($json_data, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return 'Error decoding JSON: ' . json_last_error_msg();
    }

    if (!isset($content_data['menu']) || !is_array($content_data['menu']) || !isset($content_data['content']) || !is_array($content_data['content'])) {
        return 'Invalid JSON structure.';
    }

    $menu_items = $content_data['menu'];
    $content_items = $content_data['content'];

    ob_start();
    ?>
    <div class="container mx-auto"> 
        <h2 class="text-5xl text-black mb-20">Nos expertises</h2>
    </div>
    <div id="expertise-content" class="wrapper flex">
        <div class="menu-links flex flex-col w-1/3 gap-11">
            <?php foreach ($menu_items as $index => $menu): ?>
                <div
                    class="menu-link <?php echo $menu['id']; ?> flex rounded-xl justify-end	 h-32 relative <?php echo $index === 0 ? 'active' : ''; ?>">
                    <a class="full-link w-full text-left text-xl <?php echo $index === 0 ? 'active' : ''; ?>" href="#"
                        data-target="<?php echo esc_attr($menu['id']); ?>">
                        <?php echo esc_html($menu['title']); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="separator mx-8"></div>
        <div class="homepage-content mx-32">
            <?php foreach ($content_items as $section_id => $items): ?>
                <div id="desktop-<?php echo esc_attr($section_id); ?>"
                    class="content-section <?php echo $section_id === 'seo' ? 'active' : 'hidden'; ?> <?php echo esc_attr($section_id); ?>">
                    <?php foreach ($items as $item): ?>
                        <div class="content-item">
                            <h3 class="content-title title-<?php echo esc_attr($section_id); ?>">
                                <?php echo esc_html($item['title']); ?>
                            </h3>
                            <p><?php echo esc_html($item['text']); ?></p>
                            <a href="<?php echo esc_url($item['link']['url']); ?>"
                                class="content-link"><?php echo esc_html($item['link']['text']); ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="mobile-content" class="hidden">
        <?php foreach ($menu_items as $index => $menu): ?>
            <div class="accordion-item">
                <button class="accordion-button <?php echo $index === 0 ? 'active' : ''; ?> <?php echo $menu['id']; ?>"
                    data-target="<?php echo esc_attr($menu['id']); ?>">
                    <?php echo esc_html($menu['title']); ?>
                </button>
                <div id="mobile-<?php echo esc_attr($menu['id']); ?>"
                    class="accordion-content <?php echo $index === 0 ? 'active' : 'hidden'; ?> <?php echo esc_attr($menu['id']); ?>">
                    <?php foreach ($content_items[$menu['id']] as $item): ?>
                        <div class="content-item">
                            <h2 class="content-title title-<?php echo esc_attr($menu['id']); ?>">
                                <?php echo esc_html($item['title']); ?>
                            </h2>
                            <p><?php echo esc_html($item['text']); ?></p>
                            <a href="<?php echo esc_url($item['link']['url']); ?>"
                                class="content-link"><?php echo esc_html($item['link']['text']); ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <style>
        .separator {
            height: auto;
            border-right: 3px solid black;
        }

        .homepage-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .content-item {
            margin-bottom: 20px;
            color: black;
        }

        .content-title {
            font-size: 1.5em;
            font-weight: bold;
        }

        .content-link {
            position: relative;
            border-radius: 80px;
            transition: transform 0.3s ease-in-out;
        }

        .content-link::after {
            content: "→";
            position: absolute;
            right: -30px;
            /* Ajustez cette valeur pour le positionnement horizontal de la flèche */
            top: -8px;
            transition: right 0.3s ease-in-out;
            /* Animation de la flèche */
            font-size: 1.5em;
            /* Ajustez cette valeur pour la taille de la flèche */
            opacity: 1;
        }

        .content-link:hover::after {
            right: -60px;
        }

        .menu-links {
            justify-content: flex-end;
        }

        .menu-link {
            position: relative;
            border-radius: 80px;
            transition: transform 0.3s ease-in-out;
            margin-left: -380px;
            /* Décaler les bulles vers la gauche */
            width: calc(100% + 50px);
            /* Ajuster la largeur pour maintenir la taille visible */
            justify-self: flex-end;

        }

        .menu-link:hover {
            transform: translateX(120px);
        }

        .menu-link.active {
            transform: translateX(120px);
        }

        .full-link {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            color: white;
            text-decoration: none;
            padding-right: 30px;
            width: 100%;
            height: 100%;
            border-radius: inherit;
            text-align: center;
        }

        .active {
            color: white;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 1024px) {
            #expertise-content {
                display: none;
            }

            #mobile-content {
                display: block;
            }

            .accordion-button {
                width: 100%;
                text-align: left;
                background-color: #f0f0f0;
                border: none;
                padding: 10px;
                font-size: 1.2em;
                cursor: pointer;
                outline: none;
                transition: background-color 0.3s ease-in-out;
            }

            .accordion-button:hover {
                background-color: #ddd;
            }

            .accordion-content {
                display: none;
                padding: 10px;
                border: 1px solid #ddd;
                border-top: none;
                background-color: #f9f9f9;
            }

            .accordion-content.active {
                display: block;
            }

            .accordion-button.seo {
                background: linear-gradient(90deg, #0524A7 0%, #DF22F0 26.5%, #FDA9C0 54.5%, #430A8B 86.5%);
                color: white;
            }

            .accordion-button.sea {
                background: linear-gradient(90deg, #05A9CF 0%, #5CB6E5 17.5%, #93BAEC 37%, #EDC3DF 57%, #F33585 74.5%);
                color: white;
            }

            .accordion-button.crea-web {
                background: linear-gradient(90deg, #05A9CF 0%, #95DFD2 23%, #02FEBD 48%, #029679 66%, #02A382 72.87%, #02B08A 79.75%, #044876 92.5%);
                color: white;
            }

            .accordion-button.formation {
                background: linear-gradient(90deg, #B6269D 0%, #FE48A4 33%, #FF36E4 59%, #F71729 86.5%);
                color: white;
            }
        }

        .menu-link.seo {
            background: linear-gradient(90deg, #0524A7 0%, #DF22F0 26.5%, #FDA9C0 54.5%, #430A8B 86.5%);
        }

        .menu-link.sea {
            background: linear-gradient(90deg, #05A9CF 0%, #5CB6E5 17.5%, #93BAEC 37%, #EDC3DF 57%, #F33585 74.5%);
        }

        .menu-link.crea-web {
            background: linear-gradient(90deg, #05A9CF 0%, #95DFD2 23%, #02FEBD 48%, #029679 66%, #02A382 72.87%, #02B08A 79.75%, #044876 92.5%);
        }

        .menu-link.formation {
            background: linear-gradient(90deg, #B6269D 0%, #FE48A4 33%, #FF36E4 59%, #F71729 86.5%);
        }

        .title-seo {
            background: linear-gradient(90deg, #0524A7 0%, #DF22F0 26.5%, #FDA9C0 54.5%, #430A8B 86.5%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .title-sea {
            background: linear-gradient(90deg, #05A9CF 0%, #5CB6E5 17.5%, #93BAEC 37%, #EDC3DF 57%, #F33585 74.5%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .title-crea-web {
            background: linear-gradient(90deg, #05A9CF 0%, #95DFD2 23%, #02FEBD 48%, #029679 66%, #02A382 72.87%, #02B08A 79.75%, #044876 92.5%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .title-formation {
            background: linear-gradient(90deg, #B6269D 0%, #FE48A4 33%, #FF36E4 59%, #F71729 86.5%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuLinks = document.querySelectorAll('.menu-link a');
            const accordionButtons = document.querySelectorAll('.accordion-button');

            accordionButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById('mobile-' + targetId);

                    document.querySelectorAll('.accordion-content').forEach(c => c.classList.remove('active'));
                    document.querySelectorAll('.accordion-content').forEach(c => c.classList.add('hidden'));
                    document.querySelectorAll('.accordion-button').forEach(b => b.classList.remove('active'));

                    content.classList.add('active');
                    content.classList.remove('hidden');
                    button.classList.add('active');
                });
            });

            menuLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const contentSections = document.querySelectorAll('#expertise-content .content-section');

                    document.querySelectorAll('#expertise-content .menu-link').forEach(l => l.classList.remove('active'));
                    contentSections.forEach(section => section.classList.remove('active'));
                    contentSections.forEach(section => section.classList.add('hidden'));

                    document.getElementById('desktop-' + targetId).classList.add('active');
                    document.getElementById('desktop-' + targetId).classList.remove('hidden');
                    this.parentElement.classList.add('active');
                });
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_homepage_content', 'custom_homepage_content_shortcode');
?>