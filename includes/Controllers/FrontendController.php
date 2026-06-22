<?php
/**
 * Contrôleur des comportements front-end (validation du formulaire).
 *
 * Remplace l'ancien script jQuery injecté en wp_footer par un script
 * vanilla JS dédié, enqueue proprement via wp_enqueue_script.
 *
 * @package FandPC
 */

namespace FandPC\Controllers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FrontendController {

	/**
	 * Enregistre les hooks front-end.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_validation_script' ) );
	    add_action( 'woocommerce_before_add_to_cart_button', array( $this, 'render_hidden_fields' ) );
	}

	/**
	 * Enqueue le script de validation du formulaire de personnalisation.
	 *
	 * Le live preview (texte + police) est déjà géré par view.js, propre
	 * au bloc Gutenberg. Ce script ne gère que le blocage du submit
	 * si le champ texte est vide alors qu'il est requis.
	 *
	 * @return void
	 */
	public function enqueue_validation_script() {
		if ( ! function_exists( 'is_product' ) || ! is_product() ) {
			return;
		}

		wp_enqueue_script(
			'fandpc-cart-validation',
			FANDPC_PLUGIN_URL . 'assets/cart-validation.js',
			array(),
			FANDPC_VERSION,
			true
		);
	}

	public function render_hidden_fields() {
		// Ces champs cachés sont toujours dans le form.cart WooCommerce
		// et reprennent les valeurs saisies dans le bloc via JS
		echo '<input type="hidden" name="fandpc_text" id="fandpc_text_hidden">';
		echo '<input type="hidden" name="fandpc_font" id="fandpc_font_hidden">';
	}

}