<?php
/**
 * Altis Advanced Security Module.
 *
 * @package altis/advanced-security
 */

namespace Altis\Advanced_Security;

use Altis;

/**
 * Set up action hooks.
 *
 * @return void
 */
function bootstrap() {
	// No need for the mu-plugin file to be written.
	define( 'PS_DISABLE_MU', true );
	add_action( 'plugins_loaded', __NAMESPACE__ . '\\on_plugins_loaded', 1 );
	add_action( 'mu_plugins_loaded', __NAMESPACE__ . '\\on_mu_plugins_loaded', 1 );
}

/**
 * Load plugins.
 *
 * @return void
 */
function on_plugins_loaded() {
	$config = Altis\get_config()['modules']['advanced-security'];

	if ( $config['enabled'] ) {
		if ( file_exists( Altis\ROOT_DIR . '/content/plugins/patchstack/patchstack.php' ) ) {
			require_once Altis\ROOT_DIR . '/content/plugins/patchstack/patchstack.php';

			// Grab the Patchstack object and call activate().
			$activated = get_option( 'patchstack_first_activated' );
			if ( ! $activated ) {
				if ( function_exists( 'patchstack' ) ) {
					patchstack()->activate();
				}
			}
		}
	}
}

/**
 * Load mu-plugins.
 *
 * @return void
 */
function on_mu_plugins_loaded() {
	$config = Altis\get_config()['modules']['advanced-security'];

	if ( $config['enabled'] ) {
		if ( file_exists( Altis\ROOT_DIR . '/content/plugins/patchstack/patchstack.php' ) ) {
			require_once Altis\ROOT_DIR . '/content/plugins/patchstack/patchstack.php';

			if ( ! class_exists( 'P_Firewall' ) || ! class_exists( 'P_Core' ) ) {
				// Require the core and firewall files.
				require_once Altis\ROOT_DIR . '/content/plugins/patchstack/includes/core.php';
				require_once Altis\ROOT_DIR . '/content/plugins/patchstack/includes/firewall.php';

				// For rare situations where it did not load properly.
				if ( ! class_exists( 'P_Firewall' ) || ! class_exists( 'P_Core' ) ) {
					return;
				}
			}

			// Initialize and launch.
			try {
				$core = new \P_Core( null );
				new \P_Firewall( true, $core, false, true );
			} catch ( \Exception $e ) {
				//
			}
			define( 'PS_FW_MU_RAN', true );
		}
	}
}
