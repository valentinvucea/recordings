$( document ).ready(function() {		
	$('.amsg').each(function(){
    	var id = $(this).attr('id').substring(1);
		
		$(this).click(function(){
			/* 1. toggle content */
			var msg = '#msg' + id;
			$(msg).toggle();
			
			/* 2. check if it's read and mark as read */
			if($(this).closest('tr').attr('class')=='strong')
			{
				var url = location.protocol + "//" + location.host + '/ajax/markasread/'+id;
				
				$.get(url);
				$(this).closest('tr').removeClass('strong');	
			}
		});
	});
});