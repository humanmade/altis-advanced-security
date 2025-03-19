<?php
/**
 * Altis Advanced Security Module.
 *
 * @package altis/advanced-security
 */

namespace Altis\Advanced_Security;

use Altis;

// Load in namespaced-functions.
require_once __DIR__ . '/inc/namespace.php';

add_action( 'altis.modules.init', function () {

	$default_settings = [
		'enabled'  => true,
	];
	$options = [
		'defaults' => $default_settings,
	];

    Altis\register_module(
        'advanced-security',
        __DIR__,
        'Advanced_Security',
        $options,
        __NAMESPACE__ . '\\bootstrap'
    );
} );
