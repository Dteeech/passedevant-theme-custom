<?php

// Function to add a custom meta box for the technos slider on WordPress pages
function add_custom_technos_slider_meta_box()
{
    add_meta_box(
        'technos_slider_metabox', // Unique ID for the meta box
        'Contenus du slider des technos', // Title of the meta box
        'show_custom_technos_slider_meta_box', // Callback function to display the meta box
        'page', // Post type where the meta box should appear (in this case, pages)
        'normal', // Context where the box should be displayed ('normal', 'side', etc.)
        'high' // Priority of the meta box
    );
}
add_action('add_meta_boxes', 'add_custom_technos_slider_meta_box');

// Function to display the contents of the custom meta box
function show_custom_technos_slider_meta_box()
{
    global $post;
    // Retrieve existing slides data or set an empty array if none exist
    $slides = get_post_meta($post->ID, 'contenu_du_slider_techno', true) ?: [];
    wp_nonce_field(basename(__FILE__), 'technos_slider_metabox_nonce'); // Security nonce to verify form submission
?>
    <div id="slider_technos_container">
        <?php foreach ($slides as $index => $slide): ?>
            <div class="slider_item" data-index="<?php echo $index; ?>">
                <h3>Slide <?php echo $index + 1; ?></h3>
                <label for="slider_image_url_<?php echo $index; ?>">Image:</label>
                <img id="slider_image_preview_<?php echo $index; ?>" src="<?php echo esc_url($slide['image'] ?? ''); ?>" alt="" class="slider-image-preview">
                <input type="hidden" id="slider_image_url_<?php echo $index; ?>" name="slider_image_url[<?php echo $index; ?>]" value="<?php echo esc_url($slide['image'] ?? ''); ?>" />
                <button type="button" class="button upload_image_btn" data-index="<?php echo $index; ?>">Choisir une image</button>
                <button type="button" class="button remove_image_btn" data-index="<?php echo $index; ?>">Supprimer l'image</button>

                <label for="slider_title_<?php echo $index; ?>">Titre:</label>
                <input type="text" id="slider_title_<?php echo $index; ?>" name="slider_title[<?php echo $index; ?>]" value="<?php echo esc_attr($slide['title'] ?? ''); ?>" style="width: 100%;" />

                <label for="slider_description_<?php echo $index; ?>">Description:</label>
                <?php
                // Use the WordPress editor for the description field
                $settings = array(
                    'textarea_name' => "slider_description[{$index}]", // Name attribute for the textarea
                    'textarea_rows' => 5, // Number of rows in the textarea
                    'media_buttons' => true // Show media buttons in the editor
                );
                wp_editor($slide['description'] ?? '', "slider_description_{$index}", $settings);
                ?>

                <label for="slider_link_<?php echo $index; ?>">Lien:</label>
                <input type="text" id="slider_link_<?php echo $index; ?>" name="slider_link[<?php echo $index; ?>]" value="<?php echo esc_attr(isset($slide['link']) ? $slide['link'] : ''); ?>" style="width: 100%;" />

                <label for="slider_link_text_<?php echo $index; ?>">Texte du lien:</label>
                <input type="text" id="slider_link_text_<?php echo $index; ?>" name="slider_link_text[<?php echo $index; ?>]" value="<?php echo esc_attr(isset($slide['link_text']) ? $slide['link_text'] : ''); ?>" style="width: 100%;" />

                <hr>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="button" id="add_slide">Ajouter une slide</button>

    <style>
        /* Styling for the preview image */
        .slider-image-preview {
            max-width: 100%;
            height: auto;
            max-height: 300px;
            display: block;
            margin-bottom: 10px;
        }

        /* Styling for individual slide items */
        .slider_item {
            margin-bottom: 20px;
        }

        .slider_item h3 {
            margin-bottom: 10px;
        }

        .slider_item input,
        .slider_item textarea {
            margin-top: 10px;
        }
    </style>

    <script>
        jQuery(document).ready(function($) {
            var slideIndex = <?php echo count($slides); ?>;

            // Add a new slide when the button is clicked
            $('#add_slide').on('click', function() {
                var newSlide = `<div class="slider_item" data-index="${slideIndex}">
                <h3>Slide ${slideIndex + 1}</h3>
                <label for="slider_image_url_${slideIndex}">Image:</label>
                <img id="slider_image_preview_${slideIndex}" src="" alt="" class="slider-image-preview">
                <input type="hidden" id="slider_image_url_${slideIndex}" name="slider_image_url[${slideIndex}]" value="" />
                <button type="button" class="button upload_image_btn" data-index="${slideIndex}">Choisir une image</button>
                <button type="button" class="button remove_image_btn" data-index="${slideIndex}">Supprimer l'image</button>

                <label for="slider_title_${slideIndex}">Titre:</label>
                <input type="text" id="slider_title_${slideIndex}" name="slider_title[${slideIndex}]" value="" style="width: 100%;" />

                <label for="slider_description_${slideIndex}">Description:</label>
                <div id="editor_container_${slideIndex}"></div>

                <label for="slider_link_${slideIndex}">Lien:</label>
                <input type="text" id="slider_link_${slideIndex}" name="slider_link[${slideIndex}]" value="" style="width: 100%;" />

                <label for="slider_link_text_${slideIndex}">Texte du lien:</label>
                <input type="text" id="slider_link_text_${slideIndex}" name="slider_link_text[${slideIndex}]" value="" style="width: 100%;" />
                
                <hr>
            </div>`;
                $('#slider_technos_container').append(newSlide);
                // Initialize the WordPress editor for the new slide's description
                wp_editor('', 'slider_description_' + slideIndex, {
                    textarea_name: 'slider_description[' + slideIndex + ']',
                    textarea_rows: 5,
                    media_buttons: true,
                    tinymce: true
                });
                slideIndex++;
            });

            // Handle image selection from the WordPress media library
            $(document).on('click', '.upload_image_btn', function(e) {
                e.preventDefault();
                var index = $(this).data('index');
                var mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choisir une image pour le slider',
                    button: {
                        text: 'Utiliser cette image'
                    },
                    multiple: false // Only allow one image to be selected
                });
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#slider_image_url_' + index).val(attachment.url); // Set the selected image URL in the hidden input field
                    $('#slider_image_preview_' + index).attr('src', attachment.url); // Update the image preview
                });
                mediaUploader.open();
            });

            // Remove the selected image
            $(document).on('click', '.remove_image_btn', function(e) {
                e.preventDefault();
                var index = $(this).data('index');
                $('#slider_image_url_' + index).val(''); // Clear the image URL from the hidden input
                $('#slider_image_preview_' + index).attr('src', ''); // Remove the image preview
            });
        });
    </script>
<?php
}

// Function to save the meta box data
function save_technos_slider_meta_box($post_id)
{
    // Verify nonce for security
    if (!isset($_POST['technos_slider_metabox_nonce']) || !wp_verify_nonce($_POST['technos_slider_metabox_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    $slides = [];
    // Check if there are image URLs to save
    if (isset($_POST['slider_image_url'])) {
        foreach ($_POST['slider_image_url'] as $index => $image) {
            if (!empty($image)) {
                $slides[] = [
                    'image' => sanitize_text_field($image), // Sanitize the image URL
                    'title' => sanitize_text_field($_POST['slider_title'][$index] ?? ''), // Sanitize the slide title
                    'description' => wp_kses_post($_POST['slider_description'][$index] ?? ''), // Allow limited HTML in the description
                    'link' => sanitize_text_field($_POST['slider_link'][$index] ?? ''),
                    'link_text' => sanitize_text_field($_POST['slider_link_text'][$index] ?? '')
                ];
            }
        }
    }

    // Update the post meta with the slides data
    update_post_meta($post_id, 'contenu_du_slider_techno', $slides);
}
add_action('save_post', 'save_technos_slider_meta_box');
