<?php
// Ajouter une meta box
function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // ID
        'Éléments de la Méthodologie SEO', // Titre
        'show_custom_meta_box', // Callback
        'page', // Écran (type de publication)
        'normal', // Contexte
        'high' // Priorité
    );
}
add_action('add_meta_boxes', 'add_custom_meta_box');

// Afficher la meta box
function show_custom_meta_box() {
    global $post;
    $elements = get_post_meta($post->ID, 'elements_de_la_methodologie', true);
    wp_nonce_field(basename(__FILE__), 'custom_meta_box_nonce');
    ?>
    <div id="custom-meta-box">
        <div id="repeatable-fieldset-one" class="repeatable-fieldset">
            <?php 
            if ($elements) {
                foreach ($elements as $element) { ?>
                    <div class="field-group">
                        <input type="text" name="elements_de_la_methodologie[button_text][]" value="<?php echo esc_attr($element['button_text']); ?>" placeholder="Texte du Bouton" />
                        <textarea name="elements_de_la_methodologie[content][]" placeholder="Contenu"><?php echo esc_textarea($element['content']); ?></textarea>
                        <a class="button remove-row" href="#">Retirer</a>
                    </div>
                <?php }
            } else { ?>
                <div class="field-group">
                    <input type="text" name="elements_de_la_methodologie[button_text][]" placeholder="Texte du Bouton" />
                    <textarea name="elements_de_la_methodologie[content][]" placeholder="Contenu"></textarea>
                    <a class="button remove-row" href="#">Retirer</a>
                </div>
            <?php } ?>
        </div>
        <a class="button add-row" href="#">Ajouter un Élément</a>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('.add-row').on('click', function() {
                var row = $('.field-group:first').clone();
                row.find('input').val('');
                row.find('textarea').val('');
                row.insertBefore('.add-row');
                return false;
            });

            $('.remove-row').on('click', function() {
                $(this).parents('.field-group').remove();
                return false;
            });
        });
    </script>
    <?php
}

// Enregistrer les données des meta boxes
function save_custom_meta_box($post_id) {
    if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    $elements = array();
    $button_texts = $_POST['elements_de_la_methodologie']['button_text'];
    $contents = $_POST['elements_de_la_methodologie']['content'];
    for ($i = 0; $i < count($button_texts); $i++) {
        if ($button_texts[$i] != '') {
            $elements[] = array(
                'button_text' => sanitize_text_field($button_texts[$i]),
                'content' => sanitize_textarea_field($contents[$i])
            );
        }
    }
    update_post_meta($post_id, 'elements_de_la_methodologie', $elements);
}
add_action('save_post', 'save_custom_meta_box');
