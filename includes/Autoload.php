<?php
/**
 * Custom PSR-4 autoloader.
 *
 * @link  https://www.php-fig.org/psr/psr-4/
 *
 * @package    Integration for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class IFBT_Autoload {

	/**
	 * PHP class namespace.
	 *
	 * @var string
	 */
	private static $namespace = 'WebManDesign\IFBT';

	/**
	 * Directory to load PHP classes from.
	 *
	 * @var string
	 */
	private static $directory = 'includes';

	/**
	 * Array of white-listed, allowed files for improved security.
	 *
	 * @var array
	 */
	private static $allowed_files = array(
		'/Content.php',
		'/Footer.php',
		'/Header.php',
		'/Hook.php',
		'/Loader.php',
		'/Parts.php',
	);

	/**
	 * Register custom autoload.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $class_name  Class name to load.
	 *
	 * @return  bool  True if the class was loaded, false otherwise.
	 */
	public static function register( $class_name ) {

		// Requirements check

			if ( 0 !== strpos( $class_name, self::$namespace . '\\' ) ) {
				return false;
			}


		// Variables

			$path  = '';
			$parts = explode( '\\', substr( $class_name, strlen( self::$namespace . '\\' ) ) );


		// Processing

			foreach ( $parts as $part ) {
				$path .= '/' . $part;
			}
			$path .= '.php';

			if ( ! in_array( $path, self::$allowed_files ) ) {
				return false;
			}

			$path = IFBT_PATH . self::$directory . $path;

			if ( ! file_exists( $path ) ) {
				return false;
			}

			require_once $path;


		// Output

			return true;

	} // /register

}

spl_autoload_register( 'IFBT_Autoload::register' );
