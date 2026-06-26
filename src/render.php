<?php
/**
 * Rendu serveur du bloc de personnalisation.
 *
 * @package FandPC
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fandpc_product_id = get_queried_object_id();
$fandpc_product    = wc_get_product( $fandpc_product_id );

if ( ! $fandpc_product ) {
	echo '<p><em>' . esc_html__( 'Customization block – displayed on the product page.', 'fand-product-customizer' ) . '</em></p>';
	return;
}

if ( 'yes' !== get_post_meta( $fandpc_product->get_id(), '_fandpc_enabled', true ) ) {
	return;
}

$fandpc_allowed_fonts = get_post_meta( $fandpc_product->get_id(), '_fandpc_allowed_fonts', true ) ?: array();
?>

<div <?php echo wp_kses_post( get_block_wrapper_attributes() ); ?> class="fandpc-preview-wrapper" style="margin-bottom: 20px; border: 1px solid #ddd; padding: 15px;">
	<h3><?php esc_html_e( 'Customize your product', 'fand-product-customizer' ); ?></h3>

	<label for="fandpc_text"><strong><?php esc_html_e( 'Your personalization *', 'fand-product-customizer' ); ?></strong></label><br>
	<input
		type="text"
		id="fandpc_text"
		name="fandpc_text"
		maxlength="15"
		required
		style="width: 100%;"
		placeholder="<?php esc_attr_e( 'Enter your text', 'fand-product-customizer' ); ?>"
	>

	<div id="fandpc-preview-text" style="font-size: 32px; margin: 15px 0; text-align: center; border: 2px solid #f0f0f0; padding: 20px; background-color: #fafafa; border-radius: 8px; color: #333;">
		<?php esc_html_e( 'Your text here', 'fand-product-customizer' ); ?>
	</div>

	<label for="fandpc_font" style="display: block; margin-top: 10px;"><?php esc_html_e( 'Choose a font:', 'fand-product-customizer' ); ?></label>
	<select name="fandpc_font" id="fandpc_font" style="width: 100%;">
		<option value=""><?php esc_html_e( '-- Choose a font --', 'fand-product-customizer' ); ?></option><?php
		foreach ( $fandpc_allowed_fonts as $fandpc_font_slug ) {
			$fandpc_display_name = ucwords( str_replace( '-', ' ', $fandpc_font_slug ) );
			printf(
				'<option value="%1$s">%2$s</option>',
				esc_attr( $fandpc_font_slug ),
				esc_html( $fandpc_display_name )
			);
		}
		?>
	</select>
</div>