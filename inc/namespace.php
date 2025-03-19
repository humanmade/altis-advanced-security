<?php
/**
 * Altis Advanced Security Module.
 *
 * @package altis/advanced-security
 */

namespace Altis\Advanced_Security;

use Altis;

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

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

	if ( $config['enabled'] ) {
		if ( file_exists( WP_PLUGIN_DIR . '/patchstack/patchstack.php' ) ) {
			if ( !is_plugin_active( 'patchstack/patchstack.php' ) ) {
				activate_plugin( WP_PLUGIN_DIR . '/patchstack/patchstack.php', '', true );
			}
		}
	}
}
