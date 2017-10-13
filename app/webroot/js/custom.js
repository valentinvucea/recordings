$( document ).ready(function() {		
    
    $('a#clean-sessions').on("click", function(event) {
        event.preventDefault();

        $.getJSON( "ajax/sessions", function( data ) {
            var items = [];
            $.each( data, function( key, val ) {
                items.push( '<li><a class="destroy-session" href="#" id="' + key + '">' + val + '</a></li>' );
            });

            var list = '<ul>'+items.join('');
            list+='<li><a class="destroy-session" href="#" id="all">ALL ACTIVE SESSIONS</a></li>';
            list+='</ul>';
            
            $('#popup .overlay-content').empty().html(list);
        });

        document.getElementById("popup").style.width = "100%";
    });

   $('.overlay-content').on("click", 'ul li a.destroy-session', function(event) {
        event.preventDefault();
        var id = $(this).attr('id');

        $.ajax({
            url: "ajax/destroy_session/"+id,
            success: function(data) {
                console.log('Success destroy ajax');
                if (data=="Done") {
                    $('a#'+id).closest('li').remove();
                }
            }
        });
   });  
    
    $('a#close-popup').on("click", function(event) {
        event.preventDefault();
        document.getElementById("popup").style.width = "0%";
    });

    /* set focus on first field in add view */
    $("input.focus-field").focus();
});