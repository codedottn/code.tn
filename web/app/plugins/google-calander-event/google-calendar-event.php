<?php

/**
 * Plugin Name: Google Calendar Event
 * Description: create custom google calendar events.
 * Version: 1.0.0
 * Author: Finegap
 * Author URI: https://finegap.com
 * Text Domain: Google Calendar
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '-1');
ini_set('display_errors', 1);

// Handle OAuth flow
add_action('init', 'handle_oauth_flow');
function handle_oauth_flow()
{
    if (isset($_GET['google_auth']) && $_GET['google_auth'] === 'start') {
        start_oauth();
    }

    if (isset($_GET['code'])) {
        handle_oauth_callback();
    }
}

function start_oauth()
{
    $credentials = __DIR__ . '/oauth_client.json';
    require __DIR__ . '/vendor/autoload.php';

    $client = new Google_Client();
    $client->setApplicationName('testoo');
    $client->setScopes(array(Google_Service_Calendar::CALENDAR));
    $client->setAuthConfig($credentials);
    $client->setAccessType('offline');
    $client->setRedirectUri(home_url('/?oauth_callback=1'));

    $authUrl = $client->createAuthUrl();
    wp_redirect($authUrl);
    exit;
}

function handle_oauth_callback()
{
    $credentials = __DIR__ . '/oauth_client.json';
    require __DIR__ . '/vendor/autoload.php';

    $client = new Google_Client();
    $client->setApplicationName('testoo');
    $client->setScopes(array(Google_Service_Calendar::CALENDAR));
    $client->setAuthConfig($credentials);
    $client->setAccessType('offline');
    $client->setRedirectUri(home_url('/?oauth_callback=1'));

    $client->authenticate($_GET['code']);
    $accessToken = $client->getAccessToken();

    update_option('google_oauth_token', $accessToken);
    wp_redirect(home_url('/'));
    exit;
}

/**
 *  update google code
 */
add_action('wp_footer', 'create_google_calendar_events');
function create_google_calendar_events()
{
    $credentials = __DIR__ . '/oauth_client.json';

    require __DIR__ . '/vendor/autoload.php';

    $accessToken = get_option('google_oauth_token');

    if ( ! $accessToken) {
        echo '<a href="' . home_url('/?google_auth=start') . '">Authorize Google Calendar</a>';

        return;
    }

    $client = new Google_Client();
    $client->setApplicationName('testoo');
    $client->setScopes(array(Google_Service_Calendar::CALENDAR));
    $client->setAuthConfig($credentials);
    $client->setAccessType('offline');
    $client->setAccessToken($accessToken);

    // Refresh token if expired
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        update_option('google_oauth_token', $client->getAccessToken());
    }

    $service    = new Google_Service_Calendar($client);
    $event      = new Google_Service_Calendar_Event(array(
        'summary'     => 'testing',
        'location'    => '800 Howard St., San Francisco, CA 94103',
        'description' => 'A chance to hear more about Google\'s developer products.',
        'start'       => array(
            'dateTime' => '2025-06-20T09:00:00-07:00',
            'timeZone' => 'America/Los_Angeles',
        ),
        'end'         => array(
            'dateTime' => '2025-06-20T11:00:00-07:00',
            'timeZone' => 'America/Los_Angeles',
        ),
        'attendees'   => array(
            array('email' => 'ahmedchouihi2@gmail.com'),
        ),
        'reminders'   => array(
            'useDefault' => false,
            'overrides'  => array(
                array('method' => 'email', 'minutes' => 24 * 60),
                array('method' => 'popup', 'minutes' => 10),
            ),
        ),
    ));
    $optParams  = array(
        'conferenceDataVersion' => 1,
        'sendUpdates'           => 'all'
    );
    $calendarId = 'm2lhlujab6u8ra7sf1qsb6l2r8@group.calendar.google.com';
    $event      = $service->events->insert($calendarId, $event, $optParams);
    print_r($event->htmlLink);
}