<?php

/**
 *  This file may NOT be changed, everything should be done trough the OOP structure.
 * 
 * @package CelerateTheme
 */


// If this file is called directly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here?' );

/**
 * Only tell ACF to use our text-domain if the ACF plugin is actually active.
 */
add_action( 'after_setup_theme', function () {
    if ( class_exists( 'ACF' ) ) {
        add_filter( 'acf/settings/l10n', '__return_true' );
        add_filter( 'acf/settings/l10n_textdomain', function () {
            return 'celeratewp-textdomain';
        } );
    }
} );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Classes\\Init' ) ) {
	Classes\Init::register_services();
}

