<?php
/**
 * @package CelerateTheme
 * Configures all that is necessary to register the menus of the theme
 */
namespace Classes\Functions;

final class RegisterMenus {
	public function register() {
		add_action( 'init', [ $this, 'register_menus' ] );
	}

	/**
	 * Registers the menus of the theme
	 * @return void
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				"celeratewp_header_menu" => "celeratewp Header Menu",
				"celeratewp_footer_menu" => "celeratewp Footer Menu",
				"celeratewp_mobile_menu" => "celeratewp Mobile Menu",
			)
		);
	}
}