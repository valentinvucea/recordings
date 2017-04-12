$( document ).ready(function() {

	$('a#btnAddRecord').click(function(e) {
		e.preventDefault();
		var sessid = $(this).attr('title').split('|');
		
		if( sessid[0].trim() != '' && sessid[0].trim() != sessid[1].trim() ) {
			$('body').addClass('withDialog');
			var content = '<p>You have loaded into memory links for another recording (' + sessid[0].trim() + ').\r\n';
			content += 'Choose an action:</p>';
			
			var dialog = $(content).dialog({
				modal: true,
				title: "WARNING!",
				buttons: {
					"Keep going and empty the memory": function() {
						window.location.href = '/Records/erase/' + sessid[1].trim();
						dialog.dialog('close');
					},
					"Take me to the recording kept in memory":  function() {
						window.location.href = '/Records/add/' + sessid[0].trim();
						dialog.dialog('close');
					},
					"Cancel and close this dialog":  function() {
						dialog.dialog('close');
					}
				}
			});
		} else {
			window.location.href = '/Records/add/' + sessid[1].trim();
		}
	});
	
	$('a.btnEditRecord').click(function(e) {
		e.preventDefault();
		var sessid = $(this).attr('title').split('|');
		
		if( sessid[0].trim() != '' && sessid[0].trim() != sessid[1].trim() ) {
			$('body').addClass('withDialog');
			var content = '<p>You have loaded into memory links for another record (' + sessid[0].trim() + ').\r\n';
			content += 'Choose an action:</p>';
			
			var dialog = $(content).dialog({
				modal: true,
				title: "WARNING!",
				buttons: {
					"Keep going and empty the memory": function() {
						window.location.href = '/Records/edit/' + sessid[1].trim() + '/db';
						dialog.dialog('close');
					},
					"Take me to the recording kept in memory":  function() {
						//alert('/Records/edit/' + sessid[0].trim() + '/session');
						window.location.href = '/Records/edit/' + sessid[0].trim() + '/session';
						dialog.dialog('close');
					},
					"Cancel and close this dialog":  function() {
						dialog.dialog('close');
					}
				}
			});
		} else {
			//alert('/Records/edit/' + sessid[1].trim() + '/session');
			window.location.href = '/Records/edit/' + sessid[1].trim() + '/db';
		}
	});
	
});