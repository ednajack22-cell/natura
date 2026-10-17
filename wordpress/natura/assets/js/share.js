/**
 * Share bar: shows the phone's own share sheet where the browser has one,
 * and copies the link. Without this script the other share links still work.
 */
( function () {
	document.querySelectorAll( '.share-bar' ).forEach( function ( bar ) {
		var native = bar.querySelector( '.share-native' );
		var copy = bar.querySelector( '.share-copy' );
		var status = bar.querySelector( '.share-status' );

		if ( native && navigator.share ) {
			native.hidden = false;
			native.addEventListener( 'click', function () {
				navigator.share( {
					title: native.dataset.title,
					text: native.dataset.text,
					url: native.dataset.url
				} ).catch( function () {} );
			} );
		}

		if ( copy ) {
			copy.addEventListener( 'click', function () {
				var url = copy.dataset.url;
				var done = function () {
					copy.querySelector( 'span' ).textContent = copy.dataset.done;
					if ( status ) {
						status.textContent = copy.dataset.done;
					}
				};
				if ( navigator.clipboard && navigator.clipboard.writeText ) {
					navigator.clipboard.writeText( url ).then( done ).catch( function () {
						window.prompt( '', url );
					} );
				} else {
					window.prompt( '', url );
				}
			} );
		}
	} );
}() );
