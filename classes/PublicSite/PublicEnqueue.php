<?php
/**
 * @package CelerateTheme
 * Configures all theme settings required in the theme deactivation.
 */
namespace Classes\PublicSite;

use Classes\Enums\ApiKeys;

final class PublicEnqueue {
	public function register() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_global_scripts_and_styles' ] );
		add_action( 'init', [ $this, 'register_scripts_and_styles' ] );
		add_filter( 'script_loader_tag', [ $this, 'style_script_loader_tag_modifier' ], 10, 3 );
		add_filter( 'style_loader_tag', [ $this, 'style_script_loader_tag_modifier' ], 10, 3 );
	}

	/**
	 * Modifies the script and style tags to include the versioning
	 * @param mixed $tag 				The tag to be modified
	 * @param mixed $handle 			The handle of the script or style
	 * @param mixed $src 				The source of the script or style
	 * @return mixed 					The modified tag
	 */
	public function style_script_loader_tag_modifier( $tag, $handle, $src ) {
		$versioning = '';
		if ( str_contains( $src, 'acf_blocks' ) ) {
			$new_src = remove_query_arg( 'ver', $src );
			$file_path = str_replace( get_template_directory_uri(), get_template_directory(), $new_src );
			$versioning = @filemtime( $file_path ) ?: '';
			$new_src = add_query_arg( 'ver', $versioning, $new_src );
			$tag = str_replace( $src, $new_src, $tag );
		}
		return $tag;
	}

	/**
	 * Registers the scripts and styles for later use
	 * @return void 
	 */
	public function register_scripts_and_styles() {
		wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/src/assets/library/bootstrap/css/bootstrap.css' );
		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/src/assets/library/bootstrap/js/bootstrap.js' );

		wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' );
	


	}

	/**
	 * Enqueues the global scripts and styles of the theme
	 * @return void 
	 */
	public function enqueue_global_scripts_and_styles() {
		$global_styles = array(
			'app-styles' => array(
				'path' => get_template_directory_uri() . '/build/css/app.css',
				'dependencies' => array(),
				'version' => filemtime( get_template_directory() . '/build/css/app.css' ),
				'media' => 'all',
			),
		);
		$global_scripts = array(
			'app-scripts' => array(
				'path' => get_template_directory_uri() . '/build/js/app.js',
				'dependencies' => array( 'jquery' ),
				'version' => filemtime( get_template_directory() . '/build/js/app.js' ),
				'in_footer' => true,
			),
		);

		foreach ( $global_styles as $handle_style => $style_args ) {
			wp_enqueue_style( $handle_style, $style_args['path'], $style_args['dependencies'], $style_args['version'], $style_args['media'] );
		}

		foreach ( $global_scripts as $handle_script => $script_args ) {
			wp_enqueue_script( $handle_script, $script_args['path'], $script_args['dependencies'], $script_args['version'], $script_args['in_footer'] );
		}
	}
}