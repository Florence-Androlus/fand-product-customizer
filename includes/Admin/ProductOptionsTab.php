<?php
/**
 * Onglet "Données produit" : case à cocher pour activer la personnalisation.
 *
 * Ajoute la case "Activer la personnalisation" dans l'onglet Général
 * de la fiche produit WooCommerce, et gère sa sauvegarde.
 *
 * @package FandPC
 */

namespace FandPC\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ProductOptionsTab {

	/**
	 * Meta key indiquant si la personnalisation est activée sur le produit.
	 *
	 * @var string
	 */
	const ENABLED_META_KEY = '_fandpc_enabled';

	/**
	 * Enregistre les hooks d'administration produit.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'woocommerce_product_options_general_product_data', array( $this, 'render_checkbox' ) );
		add_action( 'woocommerce_process_product_meta', array( $this, 'save_checkbox' ) );
	}

	/**
	 * Affiche la case à cocher dans l'onglet Général du produit.
	 *
	 * @return void
	 */
	public function render_checkbox() {
		woocommerce_wp_checkbox(
			array(
				'id'        	=> self::ENABLED_META_KEY,
				'label' 		=> __( 'Enable customization', 'fand-product-customizer' ),
				'description'	=> __( 'Check to display the customization block on this product.', 'fand-product-customizer' ),)
		);
	}

	/**
	 * Sauvegarde l'état de la case à cocher.
	 *
	 * @param int $post_id ID du produit.
	 *
	 * @return void
	 */
	public function save_checkbox( $post_id ) {
		// Vérification du nonce WooCommerce natif de la fiche produit.
		if ( ! isset( $_POST['woocommerce_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['woocommerce_meta_nonce'] ) ), 'woocommerce_save_data' ) ) {
			return;
		}
		
		$enabled = isset( $_POST[ self::ENABLED_META_KEY ] ) ? 'yes' : 'no';
		update_post_meta( $post_id, self::ENABLED_META_KEY, $enabled );
	}
}