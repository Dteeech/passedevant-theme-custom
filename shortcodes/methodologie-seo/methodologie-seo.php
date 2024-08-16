<?php
function methodologie_seo_shortcode()
{
    global $post;
    $elements = get_post_meta($post->ID, 'elements_de_la_methodologie', true);
    if ($elements) {
        ob_start();
?>
        <div class="methodologie-container text-white container mx-auto">
            <div class="flex flex-col lg:flex-row w-full justify-around">
                <div class=" min-w-44">
                    <?php foreach ($elements as $index => $element) : ?>
                        <button class="menu-button" data-content-id="content-<?php echo $index + 1; ?>" data-number-id="number-<?php echo $index + 1; ?>"><?php echo esc_html($element['button_text']); ?></button>
                    <?php endforeach; ?>
                </div>
                <div class="methodologie-number text-end">
                    <?php foreach ($elements as $index => $element) : ?>
                        <div id="number-<?php echo $index + 1; ?>" class="number-section" style="display: <?php echo $index === 0 ? 'flex flex-row' : 'none'; ?>"><?php echo $index + 1; ?></div>
                    <?php endforeach; ?>
                </div>
                <div class=" flex content-center items-center flex-grow w-full">
                    <?php foreach ($elements as $index => $element) : ?>
                        <div id="content-<?php echo $index + 1; ?>" class="content-section" style="display: <?php echo $index === 0 ? 'flex' : 'none'; ?>"><?php echo esc_html($element['content']); ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <style>
            .methodologie-container {
                display: flex;
                align-items: flex-start;
            }

            .menu-button {
                display: flex;
                background-color: transparent;
                /* Couleur de fond transparent */
                color: white;
                padding: 10px 10px 10px 10px;
                /* Ajuster le padding pour faire de la place pour la bulle */
                margin-bottom: 10px;
                cursor: pointer;
                border: none;
                text-align: left;
                position: relative;
                /* Pour positionner le pseudo-élément */
            }

            .menu-button::before {
                content: '';
                position: absolute;
                left: -20px;
                /* Ajuster la position */
                top: 50%;
                transform: translateY(-50%);
                width: 15px;
                height: 15px;
                background: url('data:image/svg+xml,%3Csvg%20width%3D%2230%22%20height%3D%2230%22%20viewBox%3D%220%200%2030%2030%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Ccircle%20cx%3D%2215%22%20cy%3D%2215%22%20r%3D%2215%22%20fill%3D%22%23F8ACF0%22%2F%3E%3C%2Fsvg%3E') no-repeat center center;
                background-size: contain;
                background-size: contain;
                transition: background 0.3s ease;
            }

            .menu-button.active::before {
                background: url('data:image/svg+xml,%3Csvg%20width%3D%2230%22%20height%3D%2230%22%20viewBox%3D%220%200%2030%2030%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Ccircle%20cx%3D%2215%22%20cy%3D%2215%22%20r%3D%2215%22%20fill%3D%22%237f00ff%22%2F%3E%3C%2Fsvg%3E') no-repeat center center;
                background-size: contain;
            }

            .content-section,
            .number-section {
                display: none;
                padding: 20px;
            }

            .methodologie-number {
                display: flex;
                align-items: center;
            }

            .number-section {
                font-size: 186px;
                width: 260px;
                justify-content: end;
            }

            @media screen and (max-width: 764px) {
                .number-section {
                    font-size: 180px;
                    width: auto;
                    justify-content: left;
                    text-align: start;
                }

            }

            .content-section {
                width: 40vw;
            }

            .content-section:first-child,
            .number-section:first-child {
                display: flex;
                /* Afficher le premier contenu et numéro par défaut */
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var buttons = document.querySelectorAll('.menu-button');
                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var contentId = this.getAttribute('data-content-id');
                        var numberId = this.getAttribute('data-number-id');
                        document.querySelectorAll('.content-section').forEach(function(section) {
                            section.style.display = 'none';
                        });
                        document.getElementById(contentId).style.display = 'block';
                        document.querySelectorAll('.number-section').forEach(function(section) {
                            section.style.display = 'none';
                        });
                        document.getElementById(numberId).style.display = 'block';

                        buttons.forEach(function(btn) {
                            btn.classList.remove('active');
                        });
                        this.classList.add('active');
                    });
                });
            });
        </script>
<?php
        return ob_get_clean();
    }
}
add_shortcode('methodologie_seo', 'methodologie_seo_shortcode');
