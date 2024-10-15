<?php
function add_listing_image_meta_box()
{
    add_meta_box(
        'listing_image_meta_box', // ID de la meta box
        'Image pour le Listing',  // Titre de la meta box
        'display_listing_image_meta_box', // Fonction d'affichage de la meta box
        'page', // Où la meta box va apparaître (post, page, etc.)
        'side', // Position (normal, side, etc.)
        'default' // Priorité
    );
}
add_action('add_meta_boxes', 'add_listing_image_meta_box');

// Affichage de la meta box
function display_listing_image_meta_box($post)
{
    $listing_image_url = get_post_meta($post->ID, 'listing_image_url', true); // Récupérer l'URL de l'image
?>
    <div class="listing-image-wrapper">
        <img id="listing-image-preview" src="<?php echo esc_url($listing_image_url); ?>" style="width:100%; max-height: 200px; object-fit: cover;" />
        <input type="hidden" id="listing_image_url" name="listing_image_url" value="<?php echo esc_url($listing_image_url); ?>" />
        <button type="button" class="button" id="listing-image-upload-btn">Choisir une image</button>
        <button type="button" class="button" id="listing-image-remove-btn">Supprimer l'image</button>
    </div>
    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;
            $('#listing-image-upload-btn').click(function(e) {
                e.preventDefault();
                // Si la médiathèque est déjà ouverte, la réutiliser
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                // Créer la médiathèque
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choisir une image pour le listing',
                    button: {
                        text: 'Utiliser cette image'
                    },
                    multiple: false
                });
                // Récupérer l'image choisie
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#listing_image_url').val(attachment.url);
                    $('#listing-image-preview').attr('src', attachment.url);
                });
                mediaUploader.open();
            });

            // Supprimer l'image
            $('#listing-image-remove-btn').click(function(e) {
                e.preventDefault();
                $('#listing_image_url').val('');
                $('#listing-image-preview').attr('src', '');
            });
        });
    </script>
<?php
}

// Sauvegarder la valeur du champ personnalisé
function save_listing_image_meta_box($post_id)
{
    if (isset($_POST['listing_image_url'])) {
        update_post_meta($post_id, 'listing_image_url', sanitize_text_field($_POST['listing_image_url']));
    }
}
add_action('save_post', 'save_listing_image_meta_box');
