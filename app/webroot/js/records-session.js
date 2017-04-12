$( document ).ready(function() {

	$(
	$.ajax({
		type: 'POST',
		url: '/Records/check',
		cache: false,
		dataType: 'HTML',
		success: function (html){
			if( html == 'false' )
				alert('You need to set a Recording first!")
			else
			$('#na').val(html);
		}
	});
	
});