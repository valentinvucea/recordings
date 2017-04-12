$( document ).ready(function() {		
	
    $('.btn-reset').click(function(){
		var redirectUrl = $(this).attr('id');
        redirectUrl = location.protocol + '//' + location.host + '/' + redirectUrl.replace('Reset','') + '/reset';
        
        window.location.href = redirectUrl;
	});
    
    $('a[rel="first"]').parents('span').addClass('first');
    $('a[rel="last"]').parents('span').addClass('last');
});
