<?php
function get_expertise_content() {
    $json_file_path = get_template_directory() . "/shortcodes/menu-expertises/data.json";

    if (!file_exists($json_file_path)) {
        wp_send_json_error('JSON file not found');
    }

    $json_data = file_get_contents($json_file_path);

    if ($json_data === false) {
        wp_send_json_error('Unable to read JSON file');
    }

    $content_data = json_decode($json_data, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        wp_send_json_error('Error decoding JSON: ' . json_last_error_msg());
    }

    if (!isset($content_data['menu']) || !is_array($content_data['menu']) || !isset($content_data['content']) || !is_array($content_data['content'])) {
        wp_send_json_error('Invalid JSON structure');
    }

    wp_send_json_success($content_data);
}

add_action('wp_ajax_get_expertise_content', 'get_expertise_content');
add_action('wp_ajax_nopriv_get_expertise_content', 'get_expertise_content');
