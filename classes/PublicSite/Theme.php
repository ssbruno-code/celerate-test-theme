<?php
/**
 * @package CelerateTheme
 * Configures all theme settings required in the theme deactivation.
 */

namespace Classes\PublicSite;

final class Theme {
	public function register() {
		add_action( "init", [ $this, "theme_initialization" ] );
		add_filter( "wp_title", [ $this, "theme_page_title" ], 10, 2 );
		add_filter( "upload_mimes", [ $this, "allow_svg_upload" ], 10, 1 );
		add_filter( "single_template", [ $this, "single_template_loader" ] );
		add_action( 'after_setup_theme', [ $this, 'mytheme_register_nav_menu' ], 0 );
	}

	/**
	 * Initializes the theme
	 * @return void 
	 */
	public function theme_initialization() {
		/** Required Theme Supports */
		add_theme_support( "post-thumbnails" );
		add_theme_support( "menus" );
		add_post_type_support( "page", "excerpt" );
	}


	public function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'header_menu' => __( 'Header Menu', 'celeratewp-textdomain' ),
	    	'footer_menu'  => __( 'Footer Menu', 'celeratewp-textdomain' ),
	    	'subfooter_menu'  => __( 'Subfooter Menu', 'celeratewp-textdomain' ),
		) );
	}

	/**
	 * Allows the upload of SVG files
	 * @param mixed $mimes          The list of allowed mime types
	 * @return array 
	 */
	public function allow_svg_upload( $mimes ): array {
		$mimes["svg"] = "image/svg+xml";
		return $mimes;
	}

	/**
	 * Modifies the single template loader to use specific files in the Theme based on the post type
	 * @param string $template        The template file to be used
	 * @return string
	 */
	public function single_template_loader( $template ) {
		if ( is_single() && ! is_product() ) {
			$post_type = get_post_type();
			$template = locate_template( "single-templates/single-$post_type.php" );
		}

		return $template;
	}

	/**
	 * Modifies the page title of the theme
	 * @param string $title             The title of the page
	 * @param string $sep               The separator
	 * @return string 
	 */
	public function theme_page_title( string $title, string $sep ): string {
		if ( is_home() or is_front_page() ) {
			if ( get_bloginfo( 'description' ) != '' ) {
				$title = get_bloginfo( 'name' ) . $sep . get_bloginfo( 'description' );
			} else {
				$title = get_bloginfo( 'name' );
			}
		} else {
			$title .= get_bloginfo( 'name' );
		}

		return $title;
	}
}