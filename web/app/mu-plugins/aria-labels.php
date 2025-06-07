<?php
/**
 * ARIA Labels and Roles
 * Adds ARIA labels and roles to improve screen reader compatibility
 */

function add_aria_labels() {
    // Add ARIA labels to navigation menus
    add_filter('wp_nav_menu', function($nav_menu, $args) {
        return str_replace('<nav', '<nav role="navigation" aria-label="' . esc_attr($args->menu->name) . '"', $nav_menu);
    }, 10, 2);

    // Add ARIA labels to search forms
    add_filter('get_search_form', function($form) {
        return str_replace('<form', '<form role="search" aria-label="Site Search"', $form);
    });

    // Add ARIA labels to comment forms
    add_filter('comment_form_defaults', function($defaults) {
        $defaults['title_reply_before'] = '<h3 id="reply-title" class="comment-reply-title" aria-label="Leave a Reply">';
        return $defaults;
    });
}
add_action('init', 'add_aria_labels'); 