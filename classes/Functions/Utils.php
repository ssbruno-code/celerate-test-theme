<?php
/**
 * @package CelerateTheme
 * Defines utility functions for the theme
 */
namespace Classes\Functions;

final class Utils {
	/**
	 * Prints a variable in a readable format
	 * @param mixed $data           The variable to be printed
	 * @return void 
	 */
	public static function debug_print( $data ) {
		echo "<pre>";
		print_r( $data );
		echo "</pre>";
	}

	/**
	 * Shortens a string to a given length
	 * @param mixed $string             The string to be shortened
	 * @param int $length               The length to which the string should be shortened
	 * @param string $append            The string to append to the end of the shortened string
	 * @return string 
	 */
	public static function shorten_string( $string, $length = 100, $append = "..." ) {
		$string = trim( $string );
		if ( strlen( $string ) > $length ) {
			$string = wordwrap( $string, $length );
			$string = explode( "\n", $string, 2 );
			$string = $string[0] . $append;
		}
		return $string;
	}
}