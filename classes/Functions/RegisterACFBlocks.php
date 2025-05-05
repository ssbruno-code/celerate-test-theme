<?php

/**
 * @package CelerateTheme
 * Configures all theme settings required in the theme deactivation.
 */
namespace Classes\Functions;

use WP_Query;

final class RegisterACFBlocks {
	public function register() {
		add_action( 'acf/init', [ $this, 'my_acf_init' ], 20 );
		add_filter( 'block_categories_all', [ $this, 'my_theme_block_categories' ], 10, 2 );
	}

	public function my_acf_init() {
		if ( function_exists( 'acf_register_block' ) ) {
			//Blog list block
			acf_register_block( array(
				'name' => 'hero-banner-top-block',
				'title' => __( 'Hero Banner Top', 'celeratewp-textdomain' ),
				'description' => __( 'Hero area block for the home page', 'celeratewp-textdomain' ),
				'render_callback' => [ $this, 'my_acf_block_render_callback' ],
				'category' => 'celeratewp-custom-blocks',
				'icon' => 'format-image',
				'keywords' => array( 'blog', 'home', 'posts' ),
				'enqueue_assets' => function () {
					wp_enqueue_style( 'hero-banner-top-block-css', get_template_directory_uri() . '/build/css/acf_blocks/hero-banner-top-block/styles.css' );
					wp_enqueue_script( 'hero-banner-top-block-js', get_stylesheet_directory_uri() . '/build/js/acf_blocks/hero-banner-top-block/scripts.js', array( 'jquery' ), null, true );
				}
			) );

			acf_register_block( array(
				'name' => 'logos-with-video',
				'title' => __( 'Logos with video', 'celeratewp-textdomain' ),
				'description' => __( 'Logos with video block for the home page', 'celeratewp-textdomain' ),
				'render_callback' => [ $this, 'my_acf_block_render_callback' ],
				'category' => 'celeratewp-custom-blocks',
				'icon' => 'format-image',
				'keywords' => array( 'blog', 'home', 'posts' ),
				'enqueue_assets' => function () {
					wp_enqueue_style( 'logos-with-video-block-css', get_template_directory_uri() . '/build/css/acf_blocks/logos-with-video/styles.css' );
					wp_enqueue_script( 'logos-with-video-block-js', get_stylesheet_directory_uri() . '/build/js/acf_blocks/logos-with-video/scripts.js', array( 'jquery' ), null, true );
				}
			) );

			acf_register_block( array(
				'name' => 'cards-list-with-icons',
				'title' => __( 'Cards list with icons', 'celeratewp-textdomain' ),
				'description' => __( 'Logos with video block for the home page', 'celeratewp-textdomain' ),
				'render_callback' => [ $this, 'my_acf_block_render_callback' ],
				'category' => 'celeratewp-custom-blocks',
				'icon' => 'format-image',
				'keywords' => array( 'blog', 'home', 'posts' ),
				'enqueue_assets' => function () {
					wp_enqueue_style( 'cards-list-with-icons-block-css', get_template_directory_uri() . '/build/css/acf_blocks/cards-list-with-icons/styles.css' );
					wp_enqueue_script( 'cards-list-with-icons-block-js', get_stylesheet_directory_uri() . '/build/js/acf_blocks/cards-list-with-icons/scripts.js', array( 'jquery' ), null, true );
				}
			) );

			acf_register_block( array(
				'name' => 'text-with-image',
				'title' => __( 'Text with image', 'celeratewp-textdomain' ),
				'description' => __( 'Simple text and image block', 'celeratewp-textdomain' ),
				'render_callback' => [ $this, 'my_acf_block_render_callback' ],
				'category' => 'celeratewp-custom-blocks',
				'icon' => 'format-image',
				'keywords' => array( 'blog', 'home', 'posts' ),
				'enqueue_assets' => function () {
					wp_enqueue_style( 'text-with-image-block-css', get_template_directory_uri() . '/build/css/acf_blocks/text-with-image/styles.css' );
					wp_enqueue_script( 'text-with-image-block-js', get_stylesheet_directory_uri() . '/build/js/acf_blocks/text-with-image/scripts.js', array( 'jquery' ), null, true );
				}
			) );
		}
	}
	
	public function my_acf_block_render_callback( $block ) {
		// convert name ("acf/sample") into path friendly slug ("sample")
		$slug = str_replace( 'acf/', '', $block['name'] );

		//Include a template parte from within the "template-pats/block" folder
		if ( file_exists( get_template_directory() . "/src/components/acf_blocks/{$slug}/component.php" ) ) {
			include ( get_template_directory() . "/src/components/acf_blocks/{$slug}/component.php" );
		}
	}

	function my_theme_block_categories( $categories, $post ) {
		$new_category = array(
			array(
				'slug' => 'celeratewp-custom-blocks',
				'title' => __( 'celeratewp Custom Blocks', 'celeratewp-textdomain' ),
				'icon' => 'align-full-width', // Optionally you can set an icon here
			),
		);

		// Find the index of the core category.
		$core_category_index = array_search( 'text', array_column( $categories, 'slug' ) );

		// Slice the array and insert the new category.
		if ( $core_category_index !== false ) {
			$before_core = array_slice( $categories, 0, $core_category_index );
			$after_core = array_slice( $categories, $core_category_index );
			$categories = array_merge( $before_core, $new_category, $after_core );
		} else {
			// If no core category is found, just prepend the new category.
			$categories = array_merge( $new_category, $categories );
		}
		return $categories;
	}
}
