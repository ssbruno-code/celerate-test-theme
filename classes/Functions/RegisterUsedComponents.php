<?php
/**
 * @package CelerateTheme
 * Configures all that is necessary to register the used components in the application
 */
namespace Classes\Functions;

final class RegisterUsedComponents {
	/** 
	 * The components that should have their styles preloaded 
	 * @var array 
	 * */
	private array $components_to_preload_styles = [];

	/** 
	 * The components that should have their scripts localized 
	 * @var array 
	 * */
	private array $components_to_add_localized_scripts = [];

	public function __construct() {
		$this->components_to_preload_styles = [ 
			"templates/header",
			"templates/footer",
			"templates/404-page",
			"templates/breadcrumbs",
		];

		$this->components_to_add_localized_scripts = [ 
			
		];
	}

	public function register() {
		add_action( 'get_template_part', [ $this, 'handle_used_components' ], 10, 4 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_preloaded_styles' ] );
	}

	/**
	 * Enqueues the preloaded styles
	 * @return void 
	 */
	public function enqueue_preloaded_styles() {
		foreach ( $this->components_to_preload_styles as $component ) {
			$component_css = get_template_directory() . "/build/css/{$component}/styles.css";
			if ( file_exists( $component_css ) ) {
				$versioning = filemtime( $component_css );
				wp_enqueue_style( "{$component}-styles", get_template_directory_uri() . "/build/css/{$component}/styles.css", array(), $versioning, 'all' );
			}
		}
	}

	/**
	 * Handles the used components and enqueues the scripts and styles by modifying the get_template_part hook
	 * @param mixed $template       The template name
	 * @param mixed $slug           The slug name
	 * @param mixed $name           The name of the component
	 * @param mixed $args           The arguments passed to the component
	 * @return void 
	 */
	public function handle_used_components( $template, $slug, $name, $args ) {
		if ( $slug === 'components' ) {
			$component_js = get_template_directory() . "/build/js/{$template}/scripts.js";
			$component_css = get_template_directory() . "/build/css/{$template}/styles.css";
			$template_file = get_template_directory() . "/src/components/{$template}/component.php";
			$slugged_template = str_replace( [ '/', '_' ], '-', $template );

			if ( ! file_exists( $template_file ) ) {
				echo "<div class=\"msg-warning\">Component <strong>{$template}</strong> does not exist</div>";
				return;
			}

			if ( ! in_array( $template, $this->components_to_preload_styles ) ) {
				if ( file_exists( $component_css ) ) {
					$versioning = filemtime( $component_css );
					wp_enqueue_style( "{$slugged_template}-styles", get_template_directory_uri() . "/build/css/{$template}/styles.css", array(), $versioning, 'all' );
				}
			}
			if ( file_exists( $component_js ) ) {
				$versioning = filemtime( $component_js );
				wp_enqueue_script( "{$slugged_template}-scripts", get_template_directory_uri() . "/build/js/{$template}/scripts.js", array(), $versioning, true );
			}

			if ( array_key_exists( $template, $this->components_to_add_localized_scripts ) ) {
				$localized_script = $this->components_to_add_localized_scripts[ $template ];
				wp_localize_script( "{$slugged_template}-scripts", $localized_script['object_name'], $localized_script['args'] );
			}

			include $template_file;
		}
	}
}