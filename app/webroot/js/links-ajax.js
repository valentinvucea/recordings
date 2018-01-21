$( document ).ready(function() {
	
	$('td.actions a.delete').on('click', function(event) {
		event.preventDefault();
		var url = $(this).attr('href');
		
		if (confirm('Are you sure you want to unlink this row?'))
    		window.location.replace(url);
	});
	/*
	var renderComposition = function( ul, item ) {
		//console.log(item);
		var addon = 'ID: <strong>' + item.Composition.id + '</strong>';
		addon += ( item.Genre.genre != null ? ( addon != '' ? ', ' : '' ) + 'genre: <strong>' + item.Genre.genre + '</strong>' : '');
		addon += ( item.Version.version != null ? ( addon != '' ? ', ' : '' ) + 'version: <strong>' + item.Version.version + '</strong>' : '');
		if (addon != '')
			addon = ' (' + addon + ')';
		
		return $( "<li>" )
			.append( '<div class="title"><strong>' + item.Composition.title + '</strong>' + addon + '</div>' )
			.append( '<div class="subtitle">' + item.Composition.opening_text + '</div>' )
			.appendTo( ul );
    };
	
	var renderComposer = function( ul, item ) {
		//console.log(item);
		var addon = 'ID: <strong>' + item.Composer.id + '</strong>';
		addon += ( (item.Nationality.nationality != null && item.Nationality.nationality != '') ? ( addon != '' ? ', ' : '' ) + 'nationality: <strong>' + item.Nationality.nationality + '</strong>' : '');
		addon += ( (item.Composer.dates != null && item.Composer.dates != '') ? ( addon != '' ? ', ' : '' ) + 'dates: <strong>' + item.Composer.dates + '</strong>' : '');
		
		return $( "<li>" )
			.append( '<div class="title"><strong>' + item.Composer.name + '</strong></div>' )
			.append( '<div class="subtitle">' + addon + '</div>' )
			.appendTo( ul );
    };

	var renderChoir = function( ul, item ) {
		//console.log(item);
		var addon = 'ID: <strong>' + item.Choir.id + '</strong>';
		addon += ( (item.Choir.city != null && item.Choir.city != '') ? ( addon != '' ? ', ' : '' ) + 'city: <strong>' + item.Choir.city + '</strong>' : '');
		addon += ( item.Choir.state_id != 'XX' ? ( addon != '' ? ', ' : '' ) + '<strong>' + item.Choir.state_id + '</strong>' : '');
		addon += ( (item.Country.country != null && item.Country.country != '-') ? ( addon != '' ? ', ' : '' ) + '<strong>' + item.Country.country + '</strong>' : '');
		addon += ( (item.Denomination.denomination != null && item.Denomination.denomination != '-') ? ( addon != '' ? ', ' : '' ) + 'denomination: <strong>' + item.Denomination.denomination + '</strong>' : '');
		if (addon != '')
			addon = ' (' + addon + ')';

		return $( "<li>" )
			.append( '<div class="title"><strong>' + item.Choir.choir + '</strong></div>' )
			.append( '<div class="subtitle">' + addon + '</div>' )
			.appendTo( ul );
    };
	
	var renderDirector = function( ul, item ) {
		//console.log(item);
		var addon = 'ID: <strong>' + item.Director.id + '</strong>';
		addon += ( (item.Position.position != null && item.Position.position != '') ? ( addon != '' ? ', ' : '' ) + 'position: <strong>' + item.Position.position + '</strong>' : '');
		if (addon != '')
			addon = ' (' + addon + ')';

		return $( "<li>" )
			.append( '<div class="title"><strong>' + item.Director.name + '</strong>' + addon + '</div>' )
			.appendTo( ul );
    };	
	
	$( "#RecordXCompositionId" ).autocomplete({
		minLength: 3,
		source: "http://"+window.location.hostname+"/Records/composition",
		focus: function( event, ui ) {
			$( "#RecordXCompositionId" ).val( ui.item.Composition.title );
			return false;
		},
		select: function( event, ui ) {
			$( "#RecordCompositionId" ).val( ui.item.Composition.id );
			return false;
		}
    }).autocomplete( "instance" )._renderItem = renderComposition;
	
	$( "#RecordXComposerId" ).autocomplete({
		minLength: 3,
		source: "http://"+window.location.hostname+"/Records/composer",
		focus: function( event, ui ) {
			$( "#RecordXComposerId" ).val( ui.item.Composer.name );
			return false;
		},
		select: function( event, ui ) {
			$( "#RecordComposerId" ).val( ui.item.Composer.id );
			return false;
		}
    }).autocomplete( "instance" )._renderItem = renderComposer;
	
	$( "#RecordXChoirId" ).autocomplete({
		minLength: 3,
		source: "http://"+window.location.hostname+"/Records/choir",
		focus: function( event, ui ) {
			$( "#RecordXChoirId" ).val( ui.item.Choir.choir );
			return false;
		},
		select: function( event, ui ) {
			$( "#RecordChoirId" ).val( ui.item.Choir.id );
			return false;
		}
    }).autocomplete( "instance" )._renderItem = renderChoir;

	$( "#RecordXDirectorId" ).autocomplete({
		minLength: 3,
		source: "http://"+window.location.hostname+"/Records/director",
		focus: function( event, ui ) {
			$( "#RecordXDirectorId" ).val( ui.item.Director.name );
			return false;
		},
		select: function( event, ui ) {
			$( "#RecordDirectorId" ).val( ui.item.Director.id );
			return false;
		}
    }).autocomplete( "instance" )._renderItem = renderDirector;
	*/
});