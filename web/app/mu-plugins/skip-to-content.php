<?php
/**
 * Skip to Main Content
 * Adds a skip to main content link for keyboard navigation
 */

function add_skip_to_content() {
    ?>
    <a class="screen-reader-text skip-link" href="#main-content">Skip to main content</a>
    <style>
        .skip-link {
            position: absolute;
            top: -9999px;
            left: 0;
            z-index: 999;
            padding: 1em;
            background: #fff;
            color: #000;
            text-decoration: none;
        }
        .skip-link:focus {
            top: 0;
            left: 0;
            outline: 2px solid #000;
        }
    </style>
    <?php
}
add_action('wp_body_open', 'add_skip_to_content'); 