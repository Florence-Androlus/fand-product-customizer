<?php
/**
 * Plugin Name:       Fand Product Customizer
 * Description:       Permet aux clients de personnaliser un produit (texte, police) directement sur la fiche produit WooCommerce.
 * Version:           1.0.0
 * Requires at least: 6.8
 * Tested up to:      7.0
 * Requires PHP:      7.4
 * Author:            Fand
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fand-product-customizer
 *
 * @package FandPC
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Constantes du plugin, toutes préfixées FANDPC_ pour éviter les collisions.
define( 'FANDPC_VERSION', '1.0.0' );
define( 'FANDPC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'FANDPC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'FANDPC_PLUGIN_FILE', __FILE__ );

/**
 * Autoload simple basé sur le namespace FandPC.
 * Convention : FandPC\Controllers\CartController -> includes/Controllers/CartController.php
 */
spl_autoload_register(
	function ( $class_name ) {
		$prefix = 'FandPC\\';

		if ( strncmp( $prefix, $class_name, strlen( $prefix ) ) !== 0 ) {
			return;
		}

		$relative_class = substr( $class_name, strlen( $prefix ) );
		$relative_path   = str_replace( '\\', '/', $relative_class );
		$file            = FANDPC_PLUGIN_DIR . 'includes/' . $relative_path . '.php';

		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

/**
 * Initialise le plugin une fois que WordPress est chargé.
 */
function fandpc_init_plugin() {
	\FandPC\Plugin::get_instance()->run();
}
add_action( 'plugins_loaded', 'fandpc_init_plugin' );