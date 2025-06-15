<?php

/**
 * Google Calendar Events Class
 */

defined('ABSPATH') || exit;

class GoogleCalendarEvents
{

    private $auth;

    public function __construct()
    {
        $this->auth = new GoogleCalendarAuth();
    }

    /**
     * Create Google Calendar Event (your original function)
     */
    public function create_calendar_event()
    {
        if ( ! $this->auth->is_authenticated()) {
            echo '<a href="' . $this->auth->get_auth_url() . '">Authorize Google Calendar</a>';

            return;
        }

        $client = $this->auth->get_authenticated_client();

        if ( ! $client) {
            echo 'Authentication failed. Please try again.';

            return;
        }

        require_once GCE_PLUGIN_DIR . 'vendor/autoload.php';

        $service = new Google_Service_Calendar($client);
        $event   = new Google_Service_Calendar_Event(array(
            'summary'     => 'testing',
            'location'    => '800 Howard St., San Francisco, CA 94103',
            'description' => 'A chance to hear more about Google\'s developer products.',
            'start'       => array(
                'dateTime' => '2025-06-22T09:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ),
            'end'         => array(
                'dateTime' => '2025-06-22T11:00:00-07:00',
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

        $optParams = array(
            'conferenceDataVersion' => 1,
            'sendUpdates'           => 'all'
        );

        $calendarId = 'm2lhlujab6u8ra7sf1qsb6l2r8@group.calendar.google.com';
        $event      = $service->events->insert($calendarId, $event, $optParams);
        print_r($event->htmlLink);
    }

    /**
     * Create custom event with parameters
     */
    public function create_custom_event($event_data)
    {
        if ( ! $this->auth->is_authenticated()) {
            return array('error' => 'Not authenticated');
        }

        $client = $this->auth->get_authenticated_client();

        if ( ! $client) {
            return array('error' => 'Authentication failed');
        }

        require_once GCE_PLUGIN_DIR . 'vendor/autoload.php';

        $service = new Google_Service_Calendar($client);
        $event   = new Google_Service_Calendar_Event($event_data);

        $optParams = array(
            'conferenceDataVersion' => 1,
            'sendUpdates'           => 'all'
        );

        $calendarId = isset($event_data['calendar_id']) ? $event_data['calendar_id'] : 'primary';

        try {
            $created_event = $service->events->insert($calendarId, $event, $optParams);

            return array(
                'success' => true,
                'event'   => $created_event,
                'link'    => $created_event->htmlLink
            );
        } catch (Exception $e) {
            return array('error' => $e->getMessage());
        }
    }
}