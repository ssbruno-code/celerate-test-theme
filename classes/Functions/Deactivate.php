<?php
/**
 * @package CelerateTheme
 * Configures all theme settings required in the theme deactivation.
 */
namespace Classes\Functions;

final class Deactivate {
	public function register() {
		add_action( 'switch_theme', [ $this, 'my_theme_deactivation_function' ] );
	}

	/**
	 * Actions to perform on theme deactivation.
	 * @return void 
	 */
	public function my_theme_deactivation_function() {
		/** Code triggered when theme is deactivated goes here */
		return;
	}

}
