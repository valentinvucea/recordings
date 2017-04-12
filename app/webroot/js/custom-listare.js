$( document ).ready(function() {		
	
    $('.btn-reset').click(function(){
		var redirectUrl = $(this).attr('id');
        redirectUrl = location.protocol + '//' + location.host + '/' + redirectUrl.replace('Reset','') + '/reset';
        
        window.location.href = redirectUrl;
	});
    
   $('.btn-goto').click(function(){
		var gotoUrl = $(this).attr('id');
        
        gotoPage = $('#input-goto').val();
        pages = $(this).attr('data-count');
        
        if($('#input-goto').val() == "")
            alert("Please enter the number of page where you want to go to!");
        else {
            if(parseInt($('#input-goto').val()) > parseInt($(this).attr('data-count'))) {
                alert("The page you want to go to, doesn't exists!");
            } else {
               window.location.href = location.protocol + '//' + location.host + '/' + gotoUrl.replace('Goto','') + '/index/page:' + $('#input-goto').val();
            }
        }
	}); 

    $('a[rel="first"]').parents('span').addClass('first');
    $('a[rel="last"]').parents('span').addClass('last');    
    
});