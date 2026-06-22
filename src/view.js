/**
 * Live preview du texte et de la police directement sur la page produit.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */
document.addEventListener( 'DOMContentLoaded', function () {
    var textInput  = document.getElementById( 'fandpc_text' );
    var fontSelect = document.getElementById( 'fandpc_font' );
    var previewBox = document.getElementById( 'fandpc-preview-text' );
    var hiddenText = document.getElementById( 'fandpc_text_hidden' );
    var hiddenFont = document.getElementById( 'fandpc_font_hidden' );

    if ( ! textInput || ! fontSelect || ! previewBox ) return;

    textInput.addEventListener( 'input', function () {
        previewBox.textContent = textInput.value || 'Votre texte ici';
        if ( hiddenText ) hiddenText.value = textInput.value;
    } );

    fontSelect.addEventListener( 'change', function () {
        previewBox.style.fontFamily = fontSelect.value;
        if ( hiddenFont ) hiddenFont.value = fontSelect.value;
    } );
} );