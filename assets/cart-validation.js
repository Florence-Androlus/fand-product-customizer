/**
 * Validation du formulaire produit avant ajout au panier.
 *
 * Empêche la soumission si le champ de personnalisation est requis
 * et laissé vide. Le live preview (texte + police) est géré séparément
 * par le view.js du bloc Gutenberg.
 */
document.addEventListener( 'DOMContentLoaded', function () {
	var cartForm = document.querySelector( 'form.cart' );
	var textInput = document.getElementById( 'fandpc_text' );

	if ( ! cartForm || ! textInput ) {
		return;
	}

	cartForm.addEventListener( 'submit', function ( event ) {
		if ( textInput.hasAttribute( 'required' ) && textInput.value.trim() === '' ) {
			alert( 'Veuillez saisir un texte pour la personnalisation.' );
			event.preventDefault();
		}
	} );
} );