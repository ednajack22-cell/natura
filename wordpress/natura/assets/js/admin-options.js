/**
 * Natura Options: image pickers, reset confirmations, export copy/download.
 */
( function () {
	'use strict';
	var t = window.naturaOptions || {};

	document.addEventListener( 'click', function ( event ) {
		var button = event.target.closest( 'button' );
		if ( ! button ) {
			return;
		}

		// Image picker: the WordPress media library, one image.
		if ( button.classList.contains( 'natura-media-choose' ) && window.wp && wp.media ) {
			var box = button.closest( '.natura-media' );
			var frame = wp.media( { title: t.choose, button: { text: t.use }, library: { type: 'image' }, multiple: false } );
			frame.on( 'select', function () {
				var image = frame.state().get( 'selection' ).first().toJSON();
				var size = ( image.sizes && ( image.sizes.medium || image.sizes.full ) ) || image;
				box.querySelector( 'input' ).value = image.id;
				box.querySelector( '.natura-media-preview' ).innerHTML = '';
				var img = document.createElement( 'img' );
				img.src = size.url;
				img.alt = '';
				box.querySelector( '.natura-media-preview' ).appendChild( img );
				box.querySelector( '.natura-media-remove' ).hidden = false;
			} );
			frame.open();
		}
		if ( button.classList.contains( 'natura-media-remove' ) ) {
			var media = button.closest( '.natura-media' );
			media.querySelector( 'input' ).value = '';
			media.querySelector( '.natura-media-preview' ).innerHTML = '';
			button.hidden = true;
		}

		// Resets ask first.
		if ( button.classList.contains( 'natura-reset-section' ) && ! window.confirm( t.resetSection ) ) {
			event.preventDefault();
		}
		if ( button.classList.contains( 'natura-reset-all' ) && ! window.confirm( t.resetAll ) ) {
			event.preventDefault();
		}

		// Export: copy, or save as a file.
		if ( button.classList.contains( 'natura-copy' ) ) {
			var area = document.getElementById( button.dataset.target );
			area.select();
			if ( navigator.clipboard ) {
				navigator.clipboard.writeText( area.value ).catch( function () {} );
			}
		}
		if ( button.classList.contains( 'natura-download' ) ) {
			var text = document.getElementById( button.dataset.target ).value;
			var link = document.createElement( 'a' );
			link.href = URL.createObjectURL( new Blob( [ text ], { type: 'application/json' } ) );
			link.download = button.dataset.filename;
			document.body.appendChild( link );
			link.click();
			link.remove();
		}
	} );
}() );
