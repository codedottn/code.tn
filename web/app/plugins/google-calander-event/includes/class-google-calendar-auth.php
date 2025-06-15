<?php

/**
 * Google Calendar Authentication Class
 */

defined('ABSPATH') || exit;

class GoogleCalendarAuth
{

    private $credentials_file;

    public function __construct()
    {
        $this->credentials_file = GCE_PLUGIN_DIR . 'oauth_client.json';

        // Hook OAuth actions
        add_action('init', array($this, 'handle_oauth_flow'));
    }

    /**
     * Handle OAuth flow
     */
    public function handle_oauth_flow()
    {
        if (isset($_GET['google_auth']) && $_GET['google_auth'] === 'start') {
            $this->start_oauth();
        }

        if (isset($_GET['code']) && isset($_GET['oauth_callback'])) {
            $this->handle_oauth_callback();
        }
    }

    /**
     * Start OAuth process
     */
    public function start_oauth()
    {
        require_once GCE_PLUGIN_DIR . 'vendor/autoload.php';

        $client  = $this->get_google_client();
        $authUrl = $client->createAuthUrl();
        wp_redirect($authUrl);
        exit;
    }

    /**
     * Get Google Client instance
     */
    public function get_google_client()
    {
        $client = new Google_Client();
        $client->setApplicationName('testoo');
        $client->setScopes(array(Google_Service_Calendar::CALENDAR));
        $client->setAuthConfig($this->credentials_file);
        $client->setAccessType('offline');
        $client->setPrompt('consent'); // Force consent to ensure refresh token
        $client->setRedirectUri(home_url('/?oauth_callback=1'));

        return $client;
    }

    /**
     * Handle OAuth callback
     */
    public function handle_oauth_callback()
    {
        require_once GCE_PLUGIN_DIR . 'vendor/autoload.php';

        $client = $this->get_google_client();
        $client->authenticate($_GET['code']);
        $accessToken = $client->getAccessToken();

        // Log token for debugging (remove in production)
        error_log('Received token: ' . print_r($accessToken, true));

        update_option('google_oauth_token', $accessToken);
        wp_redirect(home_url('/'));
        exit;
    }

    /**
     * Check if user is authenticated
     */
    public function is_authenticated()
    {
        $accessToken = get_option('google_oauth_token');

        if (empty($accessToken)) {
            return false;
        }

        // Try to get authenticated client to verify token is valid
        $client = $this->get_authenticated_client();

        return $client !== false;
    }

    /**
     * Get authenticated Google Client
     */
    public function get_authenticated_client()
    {
        $accessToken = get_option('google_oauth_token');

        if ( ! $accessToken) {
            error_log('No access token found in database');

            return false;
        }

        require_once GCE_PLUGIN_DIR . 'vendor/autoload.php';

        $client = $this->get_google_client();
        $client->setAccessToken($accessToken);

        // Check if token is expired
        if ($client->isAccessTokenExpired()) {
            error_log('Access token is expired, attempting to refresh');

            // Check if we have a refresh token
            if (isset($accessToken['refresh_token']) && ! empty($accessToken['refresh_token'])) {
                try {
                    // Use the refresh token from the stored token array
                    $newToken = $client->fetchAccessTokenWithRefreshToken($accessToken['refresh_token']);

                    if (isset($newToken['error'])) {
                        error_log('Error refreshing token: ' . $newToken['error']);

                        return false;
                    }

                    // Merge the new token with the existing one to preserve refresh_token
                    $mergedToken = array_merge($accessToken, $newToken);

                    // Update the stored token
                    update_option('google_oauth_token', $mergedToken);

                    // Set the new token on the client
                    $client->setAccessToken($mergedToken);

                    error_log('Token refreshed successfully');
                } catch (Exception $e) {
                    error_log('Exception refreshing token: ' . $e->getMessage());

                    return false;
                }
            } else {
                error_log('No refresh token available - user needs to re-authenticate');
                // Clear the invalid token
                delete_option('google_oauth_token');

                return false;
            }
        }

        return $client;
    }

    /**
     * Get authorization URL for display
     */
    public function get_auth_url()
    {
        return home_url('/?google_auth=start');
    }

    /**
     * Revoke token and clear stored data
     */
    public function revoke_token()
    {
        $accessToken = get_option('google_oauth_token');

        if ($accessToken) {
            require_once GCE_PLUGIN_DIR . 'vendor/autoload.php';
            $client = $this->get_google_client();
            $client->setAccessToken($accessToken);
            $client->revokeToken();
        }

        delete_option('google_oauth_token');
    }
}