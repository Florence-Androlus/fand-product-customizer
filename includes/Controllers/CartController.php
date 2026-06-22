<?php
/**
 * Contrôleur de la logique panier WooCommerce.
 *
 * @package FandPC
 */

namespace FandPC\Controllers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class CartController {

	const CART_ITEM_KEY = 'fandpc_customization';

	public function register_hooks() {
		add_filter( 'woocommerce_add_cart_item_data', array( $this, 'add_customization_to_cart' ), 10, 3 );
		add_filter( 'woocommerce_get_item_data', array( $this, 'display_customization_in_cart' ), 10, 2 );
	}

	public function add_customization_to_cart( $cart_item_data, $product_id, $variation_id ) {
		// Nonce déjà vérifié en amont par WooCommerce avant de déclencher ce filtre.
		// phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( ! empty( $_POST['fandpc_text'] ) ) {
			$cart_item_data[ self::CART_ITEM_KEY ] = array(
				'text' => sanitize_text_field( wp_unslash( $_POST['fandpc_text'] ) ), // phpcs:ignore WordPress.Security.NonceVerification.Missing
				'font' => isset( $_POST['fandpc_font'] ) ? sanitize_text_field( wp_unslash( $_POST['fandpc_font'] ) ) : '', // phpcs:ignore WordPress.Security.NonceVerification.Missing
			);
		}

		return $cart_item_data;
	}

	public function display_customization_in_cart( $item_data, $cart_item ) {
		if ( isset( $cart_item[ self::CART_ITEM_KEY ] ) ) {
			$item_data[] = array(
				'key'   => __( 'Personnalisation', 'fand-product-customizer' ),
				'value' => sprintf(
					/* translators: 1: texte personnalisé, 2: nom de la police */
					__( '%1$s (Police : %2$s)', 'fand-product-customizer' ),
					$cart_item[ self::CART_ITEM_KEY ]['text'],
					$cart_item[ self::CART_ITEM_KEY ]['font']
				),
			);
		}

		return $item_data;
	}
}