<?php
/**
 * Modèle d'accès aux polices enregistrées dans WordPress (wp_font_face).
 *
 * Centralise la récupération et le nettoyage des noms de polices,
 * ainsi que la lecture des polices autorisées pour un produit donné.
 *
 * @package FandPC
 */

namespace FandPC\Models;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class FontRepository {

	/**
	 * Meta key stockant la liste des polices autorisées sur un produit.
	 *
	 * @var string
	 */
	const ALLOWED_FONTS_META_KEY = '_fandpc_allowed_fonts';

	/**
	 * Récupère toutes les polices enregistrées via wp_font_face, avec un nom nettoyé.
	 *
	 * @return array Liste d'objets avec 'slug' et 'display_name'.
	 */
	public function get_all_fonts() {
		$raw_fonts = get_posts(
			array(
				'post_type'      => 'wp_font_face',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			)
		);

		$fonts = array();

		foreach ( $raw_fonts as $font_post ) {
			$clean_slug = explode( ';', $font_post->post_title )[0];

			$fonts[] = array(
				'slug'         => $clean_slug,
				'display_name' => ucwords( str_replace( '-', ' ', $clean_slug ) ),
			);
		}

		return $fonts;
	}

	/**
	 * Récupère la liste des slugs de polices autorisées pour un produit.
	 *
	 * @param int $product_id ID du produit.
	 *
	 * @return array
	 */
	public function get_allowed_fonts_for_product( $product_id ) {
		$allowed = get_post_meta( $product_id, self::ALLOWED_FONTS_META_KEY, true );

		return is_array( $allowed ) ? $allowed : array();
	}

	/**
	 * Sauvegarde la liste des slugs de polices autorisées pour un produit.
	 *
	 * @param int   $product_id ID du produit.
	 * @param array $fonts      Slugs des polices autorisées.
	 *
	 * @return void
	 */
	public function save_allowed_fonts_for_product( $product_id, array $fonts ) {
		update_post_meta( $product_id, self::ALLOWED_FONTS_META_KEY, $fonts );
	}
}