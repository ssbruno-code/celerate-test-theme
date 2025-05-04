<?php
/**
 * @package CelerateTheme
 * Configures all theme settings required in the theme activation.
 */
namespace Classes\Functions;

final class Activate {
	public function register() {
		add_action( 'after_theme_switch', [ $this, 'my_theme_activation_function' ] );
	}

	/**
	 * Configures actions that must be taken when changing the theme
	 * @return void 
	 */
	public function my_theme_activation_function() { }
}