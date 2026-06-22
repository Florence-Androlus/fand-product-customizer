<?php
/**
 * Classe orchestratrice principale du plugin.
 *
 * Responsable de l'enregistrement du bloc Gutenberg et de l'instanciation
 * des différents contrôleurs/admin du plugin (pattern Singleton).
 *
 * @package FandPC
 */

namespace FandPC;

use FandPC\Controllers\CartController;
use FandPC\Controllers\OrderController;
use FandPC\Controllers\FrontendController;
use FandPC\Admin\ProductOptionsTab;
use FandPC\Admin\FontsMetaBox;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {

	/**
	 * Instance unique de la classe (Singleton).
	 *
	 * @var Plugin|null
	 */
	private static $instance = null;

	/**
	 * Récupère l'instance unique du plugin.
	 *
	 * @return Plugin
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructeur privé pour empêcher l'instanciation directe.
	 */
	private function __construct() {}

	/**
	 * Lance le plugin : enregistrement du bloc et des hooks des sous-modules.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'init', array( $this, 'register_block' ) );

		// Contrôleurs liés au panier / à la commande WooCommerce.
		( new CartController() )->register_hooks();
		( new OrderController() )->register_hooks();
		( new FrontendController() )->register_hooks();

		// Écrans d'administration (onglet produit + meta box polices).
		( new ProductOptionsTab() )->register_hooks();
		( new FontsMetaBox() )->register_hooks();
	}

	/**
	 * Enregistre le bloc Gutenberg à partir du dossier /build.
	 *
	 * @return void
	 */
	public function register_block() {
		register_block_type( FANDPC_PLUGIN_DIR . 'build' );


		// C'est ICI que la magie opère pour la traduction du JS
		// Tu dis à WP : "Si tu charges le script du bloc, va chercher les trads dans /languages"
		wp_set_script_translations(
			'fand-product-customizer-editor-script', // Handle du script éditeur
			'fand-product-customizer',              // Ton Text Domain
			FANDPC_PLUGIN_DIR . 'languages'         // Dossier contenant tes .json
		);
	}
}