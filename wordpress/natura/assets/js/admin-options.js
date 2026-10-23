/**
 * Natura Options: settings search, image pickers, colour pickers, unsaved
 * changes warning, reset confirmations, export copy/download.
 */
( function () {
	'use strict';
	var t = window.naturaOptions || {};
	var dirty = false;
	var form = document.querySelector( '.natura-form' );

	// Colour pickers (WordPress's own).
	if ( window.jQuery && jQuery.fn.wpColorPicker ) {
		jQuery( '.natura-color' ).wpColorPicker( { change: function () { dirty = true; }, clear: function () { dirty = true; } } );
	}

	// Unsaved changes: warn before leaving the page.
	if ( form ) {
		form.addEventListener( 'input', function () { dirty = true; } );
		form.addEventListener( 'change', function () { dirty = true; } );
		form.addEventListener( 'submit', function () { dirty = false; } );
		window.addEventListener( 'beforeunload', function ( event ) {
			if ( dirty ) {
				event.preventDefault();
				event.returnValue = t.unsaved;
			}
		} );
	}

	// Search across every tab's settings.
	var search = document.getElementById( 'natura-search' );
	var results = document.getElementById( 'natura-search-results' );
	if ( search && results ) {
		var normalise = function ( text ) {
			return ( text || '' ).toLowerCase().normalize( 'NFD' ).replace( /[̀-ͯ]/g, '' );
		};
		search.addEventListener( 'input', function () {
			var query = normalise( search.value.trim() );
			results.innerHTML = '';
			if ( query.length < 2 ) {
				results.hidden = true;
				return;
			}
			var matches = ( t.index || [] ).filter( function ( item ) {
				return normalise( item.label + ' ' + item.help + ' ' + item.tab + ' ' + ( item.more || '' ) ).indexOf( query ) !== -1;
			} ).slice( 0, 8 );
			if ( ! matches.length ) {
				var none = document.createElement( 'li' );
				none.className = 'is-empty';
				none.textContent = t.noResults;
				results.appendChild( none );
			}
			matches.forEach( function ( item ) {
				var li = document.createElement( 'li' );
				var a = document.createElement( 'a' );
				a.href = item.url;
				var strong = document.createElement( 'strong' );
				strong.textContent = item.label;
				a.appendChild( strong );
				if ( item.tab ) {
					var span = document.createElement( 'span' );
					span.textContent = item.tab;
					a.appendChild( span );
				}
				li.appendChild( a );
				results.appendChild( li );
			} );
			results.hidden = false;
		} );
		search.addEventListener( 'keydown', function ( event ) {
			if ( 'Enter' === event.key ) {
				var first = results.querySelector( 'a' );
				if ( first ) {
					window.location = first.href;
				}
			}
			if ( 'Escape' === event.key ) {
				search.value = '';
				results.hidden = true;
			}
		} );
		document.addEventListener( 'click', function ( event ) {
			if ( ! event.target.closest( '.natura-search' ) ) {
				results.hidden = true;
			}
		} );
	}

	// Coming from a search result: show the setting.
	if ( window.location.hash.indexOf( '#field-' ) === 0 ) {
		var target = document.getElementById( window.location.hash.slice( 1 ) );
		if ( target ) {
			target.classList.add( 'is-found' );
		}
	}

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
				dirty = true;
			} );
			frame.open();
		}
		if ( button.classList.contains( 'natura-media-remove' ) ) {
			var media = button.closest( '.natura-media' );
			media.querySelector( 'input' ).value = '';
			media.querySelector( '.natura-media-preview' ).innerHTML = '';
			button.hidden = true;
			dirty = true;
		}

		// Resets ask first; Reset All needs the word "reset" typed.
		if ( button.classList.contains( 'natura-reset-section' ) && ! window.confirm( t.resetSection ) ) {
			event.preventDefault();
		}
		if ( button.classList.contains( 'natura-reset-all' ) ) {
			var answer = window.prompt( t.resetAll );
			if ( ! answer || 'reset' !== answer.trim().toLowerCase() ) {
				event.preventDefault();
			}
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
	// Live character count under texts that have a length rule.
	document.querySelectorAll( '.natura-count' ).forEach( function ( count ) {
		var field = document.getElementById( count.getAttribute( 'data-count-for' ) );
		var max = parseInt( count.getAttribute( 'data-max' ), 10 );
		var limit = count.getAttribute( 'data-limit' );
		if ( ! field ) {
			return;
		}
		function ruleOn() {
			var on = document.getElementById( limit + '-on' );
			return ! on || on.checked;
		}
		function update() {
			var length = Array.from( field.value ).length;
			var over = length > max;
			count.textContent = length + ' / ' + max + ' characters' + ( over ? ( ruleOn() ? ' — too long: shorten it to save it.' : ' — Google and Pinterest will cut the end.' ) : '' );
			count.classList.toggle( 'is-over', over );
		}
		field.addEventListener( 'input', update );
		document.querySelectorAll( 'input[name="natura[' + limit.replace( 'natura-', '' ) + ']"]' ).forEach( function ( radio ) {
			radio.addEventListener( 'change', update );
		} );
		update();
	} );
}() );
