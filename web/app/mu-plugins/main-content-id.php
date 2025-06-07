<?php
/**
 * Main Content ID
 * Adds main content ID to the content area using filters
 */

function add_main_content_id($content) {
    if (is_singular() && in_the_loop() && is_main_query()) {
        $content = '<div id="main-content">' . $content . '</div>';
    }
    return $content;
}
add_filter('the_content', 'add_main_content_id');

function add_main_content_id_to_archive($content) {
    if ((is_archive() || is_home()) && in_the_loop() && is_main_query()) {
        $content = '<div id="main-content">' . $content . '</div>';
    }
    return $content;
}
add_filter('get_the_archive_title', 'add_main_content_id_to_archive'); 