<?php

defined('ABSPATH') || exit;

// Register shortcode [google_meet]
function gmlg_meet_shortcode($atts)
{
    ob_start();
    include GMLG_PATH . 'templates/meet-form.php';

    return ob_get_clean();
}

add_shortcode('google_meet', 'gmlg_meet_shortcode');

// Add settings to admin
function gmlg_register_settings()
{
    add_option('gmlg_google_account', '');
    register_setting('gmlg_options_group', 'gmlg_google_account');
}

add_action('admin_init', 'gmlg_register_settings');

function gmlg_register_options_page()
{
    add_options_page('Google Meet Plugin', 'Google Meet', 'manage_options', 'gmlg', 'gmlg_options_page');
}

add_action('admin_menu', 'gmlg_register_options_page');

function gmlg_options_page()
{
    ?>
    <div class="wrap">
        <h1>Google Meet Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('gmlg_options_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Your Google Account (optional)</th>
                    <td>
                        <input type="email" name="gmlg_google_account" value="<?php
                        echo esc_attr(get_option('gmlg_google_account')); ?>"/>
                        <p class="description">Used to open Meet with a default account if logged in.</p>
                    </td>
                </tr>
            </table>
            <?php
            submit_button(); ?>
        </form>
    </div>
    <?php
}
