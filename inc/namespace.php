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
	add_action( 'plugins_loaded', __NAMESPACE__ . '\\on_plugins_loaded', 1 );
}

/**
 * Load plugins.
 *
 * @return void
 */
function on_plugins_loaded() {
	$config = Altis\get_config()['modules']['advanced-security'];

	// No need for the mu-plugin file to be written.
	define( 'PS_DISABLE_MU', true );

	if ( $config['enabled'] ) {
		if ( file_exists( Altis\ROOT_DIR . '/content/plugins/patchstack/patchstack.php' ) ) {
			require_once Altis\ROOT_DIR . '/content/plugins/patchstack/patchstack.php';
		}
	}
}
