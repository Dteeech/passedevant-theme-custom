<?php
add_action('add_meta_boxes', 'add_partners_logos_metabox');
add_action('save_post', 'save_partners_logos_metabox', 10, 2);

function add_partners_logos_metabox() {
    add_meta_box(
        'partners_logos',
        'Logos des partenaires',
        'partners_logos_metabox_callback',
        'page',
        'normal',
        'high'
    );
}

function partners_logos_metabox_callback($post) {
    wp_nonce_field(basename(__FILE__), 'partners_logos_nonce');
    $partners_logos = get_post_meta($post->ID, 'partners_logos', true);
    ?>
    <div id="dynamic_form">
        <div id="field_wrap">
            <?php 
            if (!empty($partners_logos)) {
                foreach ($partners_logos as $logo) {
                    ?>
                    <div class="field_row">
                        <div class="field_left">
                            <input type="text" class="meta_image_url" name="partners_logos[]" value="<?php echo esc_attr($logo); ?>" />
                        </div>
                        <div class="field_right image_wrap">
                            <img src="<?php echo esc_url($logo); ?>" height="48" width="48" />
                        </div>
                        <div class="field_right">
                            <input class="button" type="button" value="Parcourir" onclick="add_image(this)" /><br />
                            <input class="button" type="button" value="Supprimer" onclick="remove_field(this)" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div style="display:none" id="master-row">
            <div class="field_row">
                <div class="field_left">
                    <input type="text" class="meta_image_url" name="partners_logos[]" />
                </div>
                <div class="field_right image_wrap"></div>
                <div class="field_right">
                    <input type="button" class="button" value="Parcourir" onclick="add_image(this)" /><br />
                    <input class="button" type="button" value="Supprimer" onclick="remove_field(this)" />
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div id="add_field_row">
            <input class="button" type="button" value="Ajouter un champ" onclick="add_field_row();" />
        </div>
    </div>
    <?php
}

function save_partners_logos_metabox($post_id, $post) {
    if (!isset($_POST['partners_logos_nonce']) || !wp_verify_nonce($_POST['partners_logos_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    $new_partners_logos = (isset($_POST['partners_logos']) ? array_map('sanitize_text_field', $_POST['partners_logos']) : []);
    update_post_meta($post_id, 'partners_logos', $new_partners_logos);
}
