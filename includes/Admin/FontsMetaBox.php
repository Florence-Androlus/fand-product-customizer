<?php
/**
 * Meta box "Polices disponibles" sur la fiche produit.
 *
 * Permet à l'administrateur de choisir, parmi les polices enregistrées
 * dans WordPress (wp_font_face), lesquelles sont proposées au client
 * pour ce produit.
 *
 * @package FandPC
 */

namespace FandPC\Admin;

use FandPC\Models\FontRepository;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FontsMetaBox {

	/**
	 * Action de la meta box (identifiant unique).
	 *
	 * @var string
	 */
	const META_BOX_ID = 'fandpc_fonts_meta_box';

	/**
	 * Nom du champ nonce de sécurité.
	 *
	 * @var string
	 */
	const NONCE_FIELD = 'fandpc_fonts_nonce';

	/**
	 * Nom de l'action associée au nonce.
	 *
	 * @var string
	 */
	const NONCE_ACTION = 'fandpc_save_fonts';

	/**
	 * Modèle d'accès aux polices.
	 *
	 * @var FontRepository
	 */
	private $font_repository;

	/**
	 * Constructeur.
	 */
	public function __construct() {
		$this->font_repository = new FontRepository();
	}

	/**
	 * Enregistre les hooks liés à la meta box.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post_product', array( $this, 'save_meta_box' ) );
	}

	/**
	 * Déclare la meta box sur l'écran d'édition produit.
	 *
	 * @return void
	 */
	public function add_meta_box() {
		add_meta_box(
			self::META_BOX_ID,
			__( 'Fonts available for this product', 'fand-product-customizer' ),
			array( $this, 'render_meta_box' ),
			'product',
			'side',
			'default'
		);
	}

	/**
	 * Affiche le contenu de la meta box (liste de cases à cocher).
	 *
	 * @param \WP_Post $post Produit en cours d'édition.
	 *
	 * @return void
	 */
	public function render_meta_box( $post ) {
		$allowed_fonts = $this->font_repository->get_allowed_fonts_for_product( $post->ID );
		$all_fonts     = $this->font_repository->get_all_fonts();

		wp_nonce_field( self::NONCE_ACTION, self::NONCE_FIELD );

		echo '<div style="max-height: 200px; overflow-y: scroll; border: 1px solid #ccc; padding: 5px;">';

		foreach ( $all_fonts as $font ) {
			$checked = in_array( $font['slug'], $allowed_fonts, true ) ? 'checked' : '';

			printf(
				'<label><input type="checkbox" name="fandpc_allowed_fonts[]" value="%1$s" %2$s> %3$s</label><br>',
				esc_attr( $font['slug'] ),
				esc_attr( $checked ),
				esc_html( $font['display_name'] )
			);
		}

		echo '</div>';
	}

	/**
	 * Sauvegarde la sélection de polices autorisées, après vérification du nonce.
	 *
	 * @param int $post_id ID du produit.
	 *
	 * @return void
	 */
	public function save_meta_box( $post_id ) {
		if ( ! isset( $_POST[ self::NONCE_FIELD ] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ self::NONCE_FIELD ] ) ), self::NONCE_ACTION ) ) {
			return;
		}

		$selected_fonts = isset( $_POST['fandpc_allowed_fonts'] )
			? array_map( 'sanitize_text_field', wp_unslash( $_POST['fandpc_allowed_fonts'] ) )
			: array();

		$this->font_repository->save_allowed_fonts_for_product( $post_id, $selected_fonts );
	}
}