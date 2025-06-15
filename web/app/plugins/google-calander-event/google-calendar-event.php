<?php

/**
 * Plugin Name: Google Calendar Event
 * Description: create custom google calendar events.
 * Version: 1.0.0
 * Author: code.tn
 * Author URI: https://code.tn
 * Text Domain: Google Calendar
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

// Define plugin constants
define('GCE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('GCE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('GCE_VERSION', '1.0.0');

// Include required files
require_once GCE_PLUGIN_DIR . 'includes/class-google-calendar-auth.php';
require_once GCE_PLUGIN_DIR . 'includes/class-google-calendar-events.php';
require_once GCE_PLUGIN_DIR . 'includes/functions.php';

// Initialize the plugin
function init_google_calendar_plugin()
{
    $auth   = new GoogleCalendarAuth();
    $events = new GoogleCalendarEvents();

    // Hook the events creation to wp_footer (as in your original code)
    add_action('wp_footer', array($events, 'create_calendar_event'));
}

// Hook initialization
add_action('plugins_loaded', 'init_google_calendar_plugin');