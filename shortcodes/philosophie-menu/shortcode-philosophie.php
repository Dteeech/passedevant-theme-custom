<?php
function custom_philosophie_content_shortcode()
{
    $json_file_path = get_template_directory() . '/shortcodes/philosophie-menu/data.json';

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
        <h2 class="text-black text-5xl mt-20 mb-20">Notre philosophie</h2>
    </div>
    <div id="philosophie-content" class="wrapper flex">
        <div class="philosophie_menu-links flex flex-col w-1/3 gap-3">
            <?php foreach ($menu_items as $index => $menu): ?>
                <div class="philosophie_menu-link <?php echo $menu['id']; ?> flex justify-end rounded-xl align-middle items-center content-center h-12 relative <?php echo $index === 0 ? 'active' : ''; ?>">
                    <a class="philosophie_full-link w-full text-left <?php echo $index === 0 ? 'active' : ''; ?>" href="#" data-target="<?php echo esc_attr($menu['id']); ?>">
                        <?php echo esc_html($menu['title']); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="philosophie_content mx-32">
            <?php foreach ($content_items as $section_id => $items): ?>
                <div id="desktop-<?php echo esc_attr($section_id); ?>" class="content-section <?php echo $section_id === 'objectifs' ? 'active' : 'hidden'; ?> <?php echo esc_attr($section_id); ?>">
                    <?php foreach ($items as $item): ?>
                        <div class="philosophie_content-item ">
                            <h3 class="gradient-text_title content-title title-<?php echo esc_attr($section_id); ?>"><?php echo esc_html($item['title']); ?></h3>
                            <p class="mt-7"><?php echo esc_html($item['text']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="mobile-content" class="hidden">
        <?php foreach ($menu_items as $index => $menu): ?>
            <div class="accordion-item">
                <button class="accordion-button <?php echo $index === 0 ? 'active' : ''; ?> <?php echo $menu['id']; ?>" data-target="<?php echo esc_attr($menu['id']); ?>">
                    <?php echo esc_html($menu['title']); ?>
                </button>
                <div id="mobile-<?php echo esc_attr($menu['id']); ?>" class="accordion-content <?php echo $index === 0 ? 'active' : 'hidden'; ?> <?php echo esc_attr($menu['id']); ?>">
                    <?php foreach ($content_items[$menu['id']] as $item): ?>
                        <div class="philosophie_content-item">
                            <h2 class="content-title title-<?php echo esc_attr($menu['id']); ?>"><?php echo esc_html($item['title']); ?></h2>
                            <p><?php echo esc_html($item['text']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <style>

        .philosophie_content {
            display: flex;
            flex-direction: column;
            gap: 20px;
            border:2px solid black;
            padding:60px;
            
        }

        .philosophie_content-item {
            margin-bottom: 20px;
            color: black;
            max-width: 680px;
        }

        .content-title {
            font-size: 1.5em;
            font-weight: bold;
        }

        .philosophie_menu-link {
            position: relative;
            border-radius: 80px;
            transition: transform 0.3s ease-in-out;
            width: calc(100% + 50px);
        }

        

        .philosophie_full-link {
            font-size:20px;
            display: flex;
            align-items: center;
            width: 50%;
            color:#000000 !important;
            text-decoration: none;
            padding: 10px;
            height: 100%;
            border-radius: inherit;
            text-align:start !important;
        }

        .active {
            color: white;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 1024px) {
            #philosophie-content {
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
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuLinks = document.querySelectorAll('.philosophie_menu-link a');
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
                    const contentSections = document.querySelectorAll('#philosophie-content .content-section');

                    document.querySelectorAll('#philosophie-content .philosophie_menu-link').forEach(l => l.classList.remove('active'));
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
add_shortcode('custom_philosophie_content', 'custom_philosophie_content_shortcode');
