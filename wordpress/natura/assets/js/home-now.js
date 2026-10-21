/**
 * Home page, "What to plant now": matches the reader's frost dates against
 * the "When to plant" timing of each plant guide (weeks before or after the
 * last spring frost; fall crops from the first fall frost). Everything runs
 * in the browser, so the page itself stays the same for every reader. The
 * dates are remembered in this browser only, as a convenience.
 */
( function () {
	'use strict';

	var block = document.querySelector( '[data-natura-now]' );
	if ( ! block ) {
		return;
	}
	var form = block.querySelector( '[data-now-form]' );
	var list = block.querySelector( '[data-now-list]' );
	var status = block.querySelector( '[data-now-status]' );
	var more = block.querySelector( '[data-now-more]' );
	var plants, text;
	try {
		plants = JSON.parse( block.querySelector( '[data-now-plants]' ).textContent );
		text = JSON.parse( block.querySelector( '[data-now-text]' ).textContent );
	} catch ( e ) {
		return;
	}

	var SHOWN = 6;
	var lastSpringWeek = 0;
	plants.forEach( function ( plant ) {
		[ 'start_indoors', 'sow_outdoors', 'plant_out' ].forEach( function ( activity ) {
			if ( plant.timing[ activity ] ) {
				lastSpringWeek = Math.max( lastSpringWeek, plant.timing[ activity ][ 1 ] );
			}
		} );
	} );
	var ORDER = [ 'plant_out', 'sow_outdoors', 'start_indoors', 'fall_sow' ];
	var DAY = 86400000;
	var STORE = 'natura-frost-dates';

	function format( pattern, values ) {
		var i = 0;
		return pattern.replace( /%(\d)\$s|%s/g, function ( match, n ) {
			var value = n ? values[ n - 1 ] : values[ i ];
			i++;
			return value;
		} );
	}

	// Month and day of a date input, placed in the current year.
	function thisYear( value, today ) {
		var parts = /^\d{4}-(\d{2})-(\d{2})$/.exec( value || '' );
		return parts ? new Date( today.getFullYear(), parts[ 1 ] - 1, parts[ 2 ] ) : null;
	}

	function weeksFrom( date, today ) {
		return Math.round( ( today - date ) / DAY / 7 );
	}

	function card( plant, activities ) {
		var li = document.createElement( 'li' );
		var a = document.createElement( 'a' );
		a.className = 'season-card';
		a.href = plant.url;
		if ( plant.image ) {
			var img = document.createElement( 'img' );
			img.src = plant.image;
			img.alt = '';
			img.width = 72;
			img.height = 72;
			img.loading = 'lazy';
			img.setAttribute( 'nopin', 'nopin' );
			a.appendChild( img );
		}
		var body = document.createElement( 'span' );
		body.className = 'season-card-text';
		var badges = document.createElement( 'span' );
		badges.className = 'now-badges';
		activities.forEach( function ( activity ) {
			var badge = document.createElement( 'span' );
			badge.className = 'season-badge season-badge-' + activity.replace( '_', '-' );
			badge.textContent = text[ activity ];
			badges.appendChild( badge );
		} );
		var name = document.createElement( 'strong' );
		name.textContent = plant.name;
		body.appendChild( badges );
		body.appendChild( name );
		if ( plant.facts ) {
			var facts = document.createElement( 'span' );
			facts.className = 'season-card-facts';
			facts.textContent = plant.facts;
			body.appendChild( facts );
		}
		a.appendChild( body );
		li.appendChild( a );
		return li;
	}

	function show( last, first ) {
		var today = new Date();
		today = new Date( today.getFullYear(), today.getMonth(), today.getDate() );
		var spring = thisYear( last, today );
		var fall = thisYear( first, today );
		if ( ! spring ) {
			return;
		}
		// Once every spring window has passed, count towards next spring.
		if ( weeksFrom( spring, today ) > lastSpringWeek ) {
			spring = new Date( today.getFullYear() + 1, spring.getMonth(), spring.getDate() );
		}
		var now = { spring: weeksFrom( spring, today ), fall: fall ? weeksFrom( fall, today ) : null };
		var found = [];
		var next = null;

		plants.forEach( function ( plant ) {
			var due = [];
			ORDER.forEach( function ( activity ) {
				var range = plant.timing[ activity ];
				var week = 'fall_sow' === activity ? now.fall : now.spring;
				if ( ! range || null === week ) {
					return;
				}
				if ( week >= range[ 0 ] && week <= range[ 1 ] ) {
					due.push( activity );
				} else if ( range[ 0 ] > week && ( ! next || range[ 0 ] - week < next.weeks ) ) {
					next = { plant: plant, activity: activity, weeks: range[ 0 ] - week };
				}
			} );
			if ( due.length ) {
				found.push( { plant: plant, activities: due } );
			}
		} );
		// Most urgent first: what goes outside, then what starts indoors.
		found.sort( function ( a, b ) {
			return ORDER.indexOf( a.activities[ 0 ] ) - ORDER.indexOf( b.activities[ 0 ] ) || a.plant.name.localeCompare( b.plant.name );
		} );

		list.textContent = '';
		found.forEach( function ( item, i ) {
			var li = card( item.plant, item.activities );
			li.hidden = i >= SHOWN;
			list.appendChild( li );
		} );
		list.hidden = ! found.length;

		var date = spring.toLocaleDateString( 'en-US', { month: 'long', day: 'numeric' } );
		if ( found.length ) {
			status.textContent = 1 === found.length ? format( text.foundOne, [ date ] ) : format( text.found, [ found.length, date ] );
		} else if ( next ) {
			status.textContent = format( 1 === next.weeks ? text.nextOne : text.next, [ format( text.verbs[ next.activity ], [ next.plant.name.toLowerCase() ] ), next.weeks ] );
		} else {
			status.textContent = text.none;
		}
		more.hidden = found.length <= SHOWN;
		more.textContent = format( text.more, [ found.length - SHOWN ] );
	}

	more.addEventListener( 'click', function () {
		list.querySelectorAll( 'li[hidden]' ).forEach( function ( li ) {
			li.hidden = false;
		} );
		more.hidden = true;
	} );

	form.addEventListener( 'submit', function ( event ) {
		event.preventDefault();
		var last = form.elements.last.value;
		var first = form.elements.first.value;
		show( last, first );
		try {
			window.localStorage.setItem( STORE, JSON.stringify( { last: last, first: first } ) );
		} catch ( e ) {}
	} );

	// Dates this reader typed before, if the browser kept them.
	try {
		var saved = JSON.parse( window.localStorage.getItem( STORE ) || 'null' );
		if ( saved && saved.last ) {
			form.elements.last.value = saved.last;
			form.elements.first.value = saved.first || '';
			show( saved.last, saved.first );
		}
	} catch ( e ) {}
}() );
