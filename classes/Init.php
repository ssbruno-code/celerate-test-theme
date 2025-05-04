<?php
/**
 * @package CelerateTheme
 * Configures all theme settings required in the theme activation.
 */

namespace Classes;

final class Init {
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services() {
		return [ 
			Admin\AdminEnqueue::class,
			Functions\Activate::class,
			Functions\Deactivate::class,
			Functions\RegisterACFBlocks::class,
			Functions\RegisterUsedComponents::class,
			PublicSite\PublicEnqueue::class,
			PublicSite\Theme::class,
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return void
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  mixed $class     class from the services array
	 * @return mixed 			class instance  new instance of the class
	 */
	private static function instantiate( $class ) {
		$service = new $class();
		return $service;
	}
}

