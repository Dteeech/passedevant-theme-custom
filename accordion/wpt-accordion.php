<?php
/**
 * Headwall WP Tutorials : Accordion (WPTACC)
 *
 * https://wp-tutorials.tech/refine-wordpress/wordpress-accordion-without-a-plugin/
 */
// Don't access this file directly.
defined('WPINC') || die();

// Use a Font Awesome 5 graphic for the up/down toggler graphic. You can set
// this to an empty string if you don't want to see a toggler graphic in the
// headers.
const WPTACC_TOGGLER_HTML = '<i class="fas fa-chevron-circle-down"></i>';

// Change the behaviour from classic accordion (one pane visible at a time) or
// multiple panes visible.
const WPTACC_COLLAPSE_OTHERS = true; // false;

/**
 * Enable/disable inclusion of the accordion assets in the page-load.
 * @return bool   return true if you want to include the assets on this page
 *                load, otherwise return false.
 */
function wptacc_is_accordion_available() {
   return is_singular() && !is_front_page();
}

/**
 * if wptacc_is_accordion_available() returns true, enqueue our accordion
 * assets in the front-end.
 */
function wptacc_enqueue_scripts() {
   if (wptacc_is_accordion_available()) {
      $theme_version = wp_get_theme()->get('Version');
      $base_uri = get_stylesheet_directory_uri();
      $handle = 'wptacc';
      wp_enqueue_style(
         $handle,
         $base_uri . '/accordion/wpt-accordion.css',
         null,
         $theme_version
      );
      wp_enqueue_script(
         $handle,
         $base_uri . '/accordion/wpt-accordion.js',
         null,
         $theme_version,
         true
      );
      // This is where we pass our runtime parameters to the front-end in a
      // global JavaScript object called "wptacData".
      wp_localize_script(
         $handle,
         'wptacData',
         array(
            'togglerHtml' => WPTACC_TOGGLER_HTML,
            'collapseOthers' => WPTACC_COLLAPSE_OTHERS,
         )
      );
      do_action('wpt_accordion_enqueued');
   }
}
add_action('wp_enqueue_scripts', 'wptacc_enqueue_scripts');
