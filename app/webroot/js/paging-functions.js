$( document ).ready(function() {		
    $("input[id$='Reset']").click(function(){
		var redirectUrl = $(this).attr('id');
		console.log(redirectUrl);
        redirectUrl = location.protocol + '//' + location.host + '/' + redirectUrl.replace('Reset','') + '/reset';
        
        window.location.href = redirectUrl;
	});
    
    $('input[type=button][id$="Goto"]').click(function(){
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
	
    $("div.actions-top ul li a.show-more").click(function(event){
		event.preventDefault();
		$( "tr.extra" ).each(function( index ) {
			if($(this).hasClass('hidden')) {
				$(this).removeClass('hidden');
				$("div.actions-top ul li a.show-more").text('Show less');
			} else {
				$(this).addClass('hidden');
				$("div.actions-top ul li a.show-more").text('Show more');
			}
		});
	});  

});