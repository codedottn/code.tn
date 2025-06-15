<?php

/**
 * Helper Functions
 */

defined('ABSPATH') || exit;

/**
 * Set PHP configuration for the plugin
 */
function gce_set_php_config()
{
    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', '-1');
    ini_set('display_errors', 1);
}

// Call on plugin load
gce_set_php_config();

/**
 * Get plugin version
 */
function gce_get_version()
{
    return GCE_VERSION;
}

/**
 * Check if Google Calendar is authenticated
 */
function gce_is_authenticated()
{
    $auth = new GoogleCalendarAuth();

    return $auth->is_authenticated();
}

/**
 * Get Google Calendar auth URL
 */
function gce_get_auth_url()
{
    $auth = new GoogleCalendarAuth();

    return $auth->get_auth_url();
}

/**
 * Create a simple calendar event (helper function)
 */
function gce_create_simple_event(
    $title,
    $description = '',
    $start_time = '+1 hour',
    $end_time = '+2 hours',
    $attendees = array()
) {
    $events = new GoogleCalendarEvents();

    $event_data = array(
        'summary' => $title,
        'description' => $description,
        'start' => array(
            'dateTime' => date('Y-m-d\TH:i:s', strtotime($start_time)),
            'timeZone' => get_option('timezone_string') ?: 'UTC',
        ),
        'end' => array(
            'dateTime' => date('Y-m-d\TH:i:s', strtotime($end_time)),
            'timeZone' => get_option('timezone_string') ?: 'UTC',
        ),
        'attendees' => array_map(function ($email) {
            return array('email' => $email);
        }, $attendees),
    );

    return $events->create_custom_event($event_data);
}

/**
 * Debug function - remove in production
 */
function gce_debug($data)
{
    if (WP_DEBUG) {
        error_log('GCE Debug: ' . print_r($data, true));
    }
}