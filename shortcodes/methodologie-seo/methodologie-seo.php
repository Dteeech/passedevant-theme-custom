<?php
function methodologie_seo_shortcode()
{
    global $post;
    // Retrieve the elements of the methodology from post meta
    $elements = get_post_meta($post->ID, 'elements_de_la_methodologie', true);
    if ($elements) {
        ob_start();
?>
        <!-- Desktop Version -->
        <div class="methodologie-container text-white w-full flex">
            <div class="flex">
                <div class="menu-wrapper">
                    <?php foreach ($elements as $index => $element) : ?>
                        <!-- Button to display the content for each element in the methodology -->
                        <button class="menu-button <?php echo $index === 0 ? 'active' : ''; ?>" data-content-id="content-<?php echo $index + 1; ?>" data-number-id="number-<?php echo $index + 1; ?>">
                            <?php echo esc_html($element['button_text']); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <div class="methodologie-number text-end">
                    <?php foreach ($elements as $index => $element) : ?>
                        <!-- Number corresponding to each section, initially showing only the first -->
                        <div id="number-<?php echo $index + 1; ?>" class="number-section" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                            <?php echo $index + 1; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="content-wrapper">
                    <?php foreach ($elements as $index => $element) : ?>
                        <!-- Content for each element, initially showing only the first -->
                        <div id="content-<?php echo $index + 1; ?>" class="content-section" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                            <?php echo esc_html($element['content']); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Mobile Version -->
        <div class="methodologie-container_mobile text-white w-full lg:hidden">
            <div class="accordion-wrapper">
                <?php foreach ($elements as $index => $element) : ?>
                    <div class="accordion-item flex flex-col">
                        <!-- Accordion header for each element -->
                        <div class="accordion-header block <?php echo $index === 0 ? 'active' : ''; ?>" data-content-id="content-<?php echo $index + 1; ?>">
                            <div class="number-section">
                                <?php echo $index + 1; ?>
                            </div>
                            <button class="menu-button">
                                <?php echo esc_html($element['button_text']); ?>
                            </button>
                        </div>
                        <!-- Accordion content, initially showing only the first -->
                        <div id="content-<?php echo $index + 1; ?>" class="accordion-content" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                            <div class="content-section">
                                <?php echo esc_html($element['content']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <style>
            .methodologie-container_mobile {
                display: none;
            }

            .methodologie-container {
                display: flex;
                align-items: flex-start;
                justify-content: center;
                width: 60vw;
                margin: auto;
            }

            .methodologie-container .menu-wrapper {
                border: 1px solid white;
                border-radius: 12px;
                height: fit-content;
                padding: 0;
                width: fit-content;
            }

            .menu-button {
                display: flex;
                background-color: transparent;
                color: white;
                padding: 40px;
                margin-bottom: 10px;
                cursor: pointer;
                border: none;
                text-align: left;
                position: relative;
                width: 240px;
                margin: 0;
            }

            .menu-button:hover {
                background-color: rgba(255, 255, 255, 0.5);
            }

            .menu-button.active {
                background-color: white;
                color: #1E1E1E;
                border-radius: 10px;
            }

            .methodologie-container .content-section {
                width: 700px;
            }

            .content-section,
            .number-section {
                padding: 20px;
            }

            .methodologie-number {
                display: block;
                align-items: center;
            }

            .number-section {
                font-size: 186px;
                width: 260px;
                justify-content: end;
                text-align: center;
            }

            .accordion-wrapper {
                width: 100%;
                border: 1px solid white;
                border-radius: 12px;
                overflow: hidden;
            }

            .accordion-item {
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }

            .accordion-header {
                width: 100%;
                background-color: transparent;
                color: white;
                padding: 20px;
                cursor: pointer;
                border: none;
                text-align: left;
                display: flex;
                align-items: center;
            }

            .accordion-header .number-section {
                font-size: 24px;
                font-weight: bold;
                margin-right: 10px;
            }

            .accordion-header.active {
                background-color: white;
                color: #1E1E1E;
            }

            .accordion-content {
                display: none;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.1);
            }

            @media screen and (max-width: 768px) {
                .methodologie-container {
                    display: none;
                }

                .methodologie-container_mobile {
                    display: block;
                }

                .methodologie-container_mobile {
                    max-width: 100% !important;
                }

                .methodologie-container_mobile .number-section {
                    width: auto !important;
                    color: #FFF;
                    mix-blend-mode: difference;
                }

                .methodologie-container_mobile .content-section {
                    display: block !important;
                }

                .accordion-header:hover,
                .accordion-header:active,
                .methodologie-container_mobile .menu-button:active,
                .methodologie-container_mobile .menu-button:hover {
                    background-color: white;
                    color: #1E1E1E !important;
                }
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var buttons = document.querySelectorAll('.menu-button');
                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        // Get the content ID and number ID for the clicked button
                        var contentId = this.getAttribute('data-content-id');
                        var numberId = this.getAttribute('data-number-id');

                        // Hide all content sections before showing the selected one
                        document.querySelectorAll('.content-section').forEach(function(section) {
                            section.style.display = 'none';
                        });
                        document.getElementById(contentId).style.display = 'block';

                        // Hide all number sections before showing the selected one
                        document.querySelectorAll('.number-section').forEach(function(section) {
                            section.style.display = 'none';
                        });
                        document.getElementById(numberId).style.display = 'block';

                        // Remove 'active' class from all buttons
                        buttons.forEach(function(btn) {
                            btn.classList.remove('active');
                        });
                        // Add 'active' class to the clicked button
                        this.classList.add('active');
                    });
                });

                // Select all accordion headers for adding click event listeners
                var headers = document.querySelectorAll('.accordion-header');
                headers.forEach(function(header) {
                    header.addEventListener('click', function() {
                        // Get the next element sibling (the content) of the clicked header
                        var content = this.nextElementSibling;
                        var isOpen = content.style.display === 'block';

                        // Hide all accordion contents before showing the selected one
                        document.querySelectorAll('.accordion-content').forEach(function(section) {
                            section.style.display = 'none';
                        });

                        // Remove 'active' class from all headers
                        headers.forEach(function(btn) {
                            btn.classList.remove('active');
                        });

                        // Toggle the selected accordion content
                        if (!isOpen) {
                            content.style.display = 'block';
                            this.classList.add('active');
                        }
                    });
                });
            });
        </script>
<?php


        return ob_get_clean();
    }
}
add_shortcode('methodologie_seo', 'methodologie_seo_shortcode');
