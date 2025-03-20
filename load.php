<?php
/**
 * Altis Advanced Security Module.
 *
 * @package altis/advanced-security
 */

namespace Altis\Advanced_Security;

use Altis;

add_action( 'altis.modules.init', function () {

	$default_settings = [
		'enabled' => true,
	];
	$options = [
		'defaults' => $default_settings,
	];

	Altis\register_module(
		'advanced-security',
		__DIR__,
		'Advanced Security Add-on',
		$options,
		__NAMESPACE__ . '\\bootstrap'
	);
} );
