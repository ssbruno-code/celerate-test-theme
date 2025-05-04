<?php

/**
 * @package CelerateTheme
 * Configures all theme settings required in the theme deactivation.
 */

namespace Classes\Admin;

final class AdminEnqueue {

	public function register() {
		add_action( "admin_init", [ $this, "register_scripts_and_styles" ] );
		add_action( "enqueue_block_editor_assets", [ $this, "enqueue_block_editor_assets" ] );
	}

	/**
	 * Registers the scripts and styles for later use
	 * @return void 
	 */
	public function register_scripts_and_styles(): void {
		
	}

	/**
	 * Enqueues global styles and scripts to apply specific rules to Gutenberg ACF Blocks
	 */
	public function enqueue_block_editor_assets() {
		wp_enqueue_style( "gutenberg-blocks-styles", get_template_directory_uri() . "/build/css/gutenberg-blocks-rules.css", array(), "", "all" );
	}
}