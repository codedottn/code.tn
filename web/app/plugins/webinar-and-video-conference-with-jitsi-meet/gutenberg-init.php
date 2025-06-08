<?php //phpcs:ignore
/**
 *  Exit if accessed directly
 *
 * @package JITSI_MEET_WP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


require __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;

// Make sure the same class is not loaded twice.
if ( ! class_exists( 'Jitsi_Meet_WP_Gutenberg' ) ) {

	/**
	 * Main Jiti Meet WP Class
	 *
	 * The main class that initiates and runs the Jitsi Meet WP plugin.
	 *
	 * @since 1.0.0
	 */
	class Jitsi_Meet_WP_Gutenberg {
		/**
		 * Instance
		 *
		 * Holds a single instance of the `Jitsi_Meet_WP` class.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Jitsi_Meet_WP A single instance of the class.
		 */
		private static $instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @return Jitsi_Meet_WP An instance of the class.
		 * @since 1.0.0
		 *
		 * @access public
		 * @static
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @return void
		 * @since 1.0.0
		 *
		 * @access protected
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'jitsi-meet-wp' ), '1.0.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @return void
		 * @since 1.7.0
		 *
		 * @access protected
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'jitsi-meet-wp' ), '1.0.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the Jitsi Meet WP plugins.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function __construct() {
			add_action( 'enqueue_block_editor_assets', array( $this, 'jitsi_meet_wp_gutenberg_blocks' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'jitsi_meet_wp_gutenberg_editor_assets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'jitsi_meet_wp_gutenberg_front_assets' ) );
		}

		/**
		 * Enqueue block script
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function jitsi_meet_wp_gutenberg_blocks() {
			wp_register_script( 'jitsi-meet-wp-block', plugins_url( '/blocks/dist/blocks.build.js', __FILE__ ), array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-i18n' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks/dist/blocks.build.js' ), false );

			$selected_domain = get_option( 'jitsi_opt_select_api', true );
			$free_domain     = get_option( 'jitsi_opt_free_domain', 'jitsi-01.csn.tu-chemnitz.de' );

			wp_localize_script(
				'jitsi-meet-wp-block',
				'jitsi',
				array(
					'meeting_width'       => get_option( 'jitsi_opt_width', 1080 ),
					'meeting_height'      => get_option( 'jitsi_opt_height', 720 ),
					'startwithaudiomuted' => get_option( 'jitsi_opt_start_local_audio_muted', 0 ) ? 1 : 0,
					'startwithvideomuted' => get_option( 'jitsi_opt_startWithVideoMuted', 0 ) ? 1 : 0,
					'startscreensharing'  => get_option( 'jitsi_opt_startScreenSharing', 0 ) ? 1 : 0,
					'invite'              => get_option( 'jitsi_opt_invite', 1 ) ? 1 : 0,
					'domain'              => 'jaas' === $selected_domain ? '8x8.vc' : $free_domain,

				)
			);
			wp_enqueue_script( 'jitsi-meet-wp-block' );
		}

		/**
		 * Enqueue editor assets
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function jitsi_meet_wp_gutenberg_editor_assets() {
			wp_enqueue_style( 'jitsi-meet-wp-editor-css', plugins_url( '/blocks/dist/blocks.editor.build.css', __FILE__ ), array(), filemtime( plugin_dir_path( __FILE__ ) . '/blocks/dist/blocks.editor.build.css' ) );
		}

		/**
		 * Enqueue frontend assets
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function jitsi_meet_wp_gutenberg_front_assets() {
			$jisit_css_ver = gmdate( 'ymd-Gis', filemtime( plugin_dir_path( __FILE__ ) . '/blocks/dist/blocks.style.build.css' ) );

			wp_enqueue_style( 'jitsi-meet-wp', plugins_url( '/blocks/dist/blocks.style.build.css', __FILE__ ), false, $jisit_css_ver );

			if ( is_singular() ) {
				wp_enqueue_script( 'jitsi-8x8-api', 'https://8x8.vc/external_api.js', null, '2.1.2', false );
				wp_enqueue_script( 'jitsi-script', plugins_url( '/blocks/dist/jitsi.js', __FILE__ ), array( 'jquery', 'wp-blocks' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks/dist/jitsi.js' ), '2.1.2' );

				wp_localize_script(
					'jitsi-script',
					'jitsi_free',
					array(
						'appid'      => get_option( 'jitsi_opt_app_id', '' ),
						'api_select' => get_option( 'jitsi_opt_select_api', 'jaas' ),
						'jwt'        => $this->jitsi_pro_generate_jwt(),
						'ajaxurl'    => admin_url( 'admin-ajax.php' ),
					)
				);
			}
		}

		public function jitsi_pro_generate_jwt() {
			$prefix      = 'jitsi_opt_';
			$token       = get_transient( 'jitsi_saved_jwt' );
			$private_key = get_option( $prefix . 'private_key', '' );
			$api_key     = get_option( $prefix . 'api_key', '' );
			$app_id      = get_option( $prefix . 'app_id', '' );

			if ( ! $private_key || ! $api_key || ! $app_id ) {
				return '';
			}

			if ( false === $token && ! empty( $private_key ) ) {
				// Getting configuration.
				$api_key = $api_key;
				$app_id  = $app_id;

				$admin_avatar = '';
				$admin_name   = '';
				$admin_email  = '';

				if ( is_user_logged_in() ) {
					$current_user = wp_get_current_user();
					$admin_avatar = get_avatar_url( $current_user->ID );
					$admin_name   = $current_user->display_name;
					$admin_email  = $current_user->user_email;
				}

				$user_email               = '';
				$user_name                = '';
				$user_is_moderator        = '';
				$user_avatar_url          = '';
				$livestreaming_is_enabled = false;
				$recording_is_enabled     = false;
				$outbound_is_enabled      = false;
				$transcription_is_enabled = false;
				$exp_delay_sec            = 7200;
				$nbf_delay_sec            = 10;

				function create_jaas_token(
					$api_key,
					$app_id,
					$user_email,
					$user_name,
					$user_is_moderator,
					$user_avatar_url,
					$live_streaming_enabled,
					$recording_enabled,
					$outbound_enabled,
					$transcription_enabled,
					$exp_delay,
					$nbf_delay,
					$private_key
				) {
					try {

						// Validate private key.
						$private_key_resource = openssl_pkey_get_private( $private_key );

						if ( ! $private_key_resource ) {
							return null;
						}

						$payload = array(
							'iss'     => 'chat',
							'aud'     => 'jitsi',
							'exp'     => time() + $exp_delay,
							'nbf'     => time() - $nbf_delay,
							'room'    => '*',
							'sub'     => $app_id,
							'context' => array(
								'user'     => current_user_can( 'edit_posts' ) ? array(
									'moderator' => $user_is_moderator ? 'true' : 'false',
									'email'     => $user_email,
									'name'      => $user_name,
									'avatar'    => $user_avatar_url,
								) : array(
									'moderator' => 'false',
								),
								'features' => array(
									'recording'     => $recording_enabled ? 'true' : 'false',
									'livestreaming' => $live_streaming_enabled ? 'true' : 'false',
									'transcription' => $transcription_enabled ? 'true' : 'false',
									'outbound-call' => $outbound_enabled ? 'true' : 'false',
								),
							),
						);

						$payload_json = wp_json_encode( $payload );
						$success      = openssl_sign( $payload_json, $signature, $private_key_resource, OPENSSL_ALGO_SHA256 );

						// Conditionally free the private key resource if PHP version is less than 8.0.
						if ( version_compare( PHP_VERSION, '8.0.0', '<' ) ) {
							// phpcs:ignore Generic.PHP.DeprecatedFunctions.Deprecated -- Necessary for PHP < 8.0
							openssl_free_key( $private_key_resource );
						}

						// Check if signing was successful.
						if ( ! $success ) {
							return null;
						}

						return JWT::encode( $payload, $private_key, 'RS256', $api_key );

					} catch ( Exception $e ) {
						return null;
					}
				}

				$token = create_jaas_token(
					$api_key,
					$app_id,
					$user_email ? $user_email : $admin_email,
					$user_name ? $user_name : $admin_name,
					$user_is_moderator,
					$user_avatar_url ? $user_avatar_url : $admin_avatar,
					$livestreaming_is_enabled,
					$recording_is_enabled,
					$outbound_is_enabled,
					$transcription_is_enabled,
					$exp_delay_sec,
					$nbf_delay_sec,
					$private_key
				);

				set_transient( 'jitsi_saved_jwt', $token, 10 );
			}

			return $token;
		}
	}
}
