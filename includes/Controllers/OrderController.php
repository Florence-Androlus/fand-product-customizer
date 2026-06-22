<?php
/**
 * Contrôleur de la persistance de la personnalisation dans la commande.
 *
 * Transfère les données de personnalisation du panier vers les meta data
 * de la ligne de commande au moment du passage de commande.
 *
 * @package FandPC
 */

namespace FandPC\Controllers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class OrderController {

	/**
	 * Enregistre les hooks WooCommerce liés à la création de la commande.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'woocommerce_checkout_create_order_line_item', array( $this, 'save_customization_to_order_item' ), 10, 4 );
	}

	/**
	 * Sauvegarde la personnalisation en meta data sur l'item de commande.
	 *
	 * @param \WC_Order_Item_Product $item          Item de commande WooCommerce.
	 * @param string                 $cart_item_key Clé de l'item dans le panier.
	 * @param array                  $values        Données complètes de l'item du panier.
	 * @param \WC_Order               $order         Commande WooCommerce.
	 *
	 * @return void
	 */
	public function save_customization_to_order_item( $item, $cart_item_key, $values, $order ) {
		if ( isset( $values[ CartController::CART_ITEM_KEY ] ) ) {
			$customization = $values[ CartController::CART_ITEM_KEY ];

			$item->add_meta_data(
				__( 'Personnalisation', 'fand-product-customizer' ),
				sprintf( '%s (%s)', $customization['text'], $customization['font'] )
			);
		}
	}
}