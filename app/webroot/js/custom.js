$( document ).ready(function() {
   // $('.overlay-content').on("click", 'ul li a.destroy-session', function(event) {
   //      event.preventDefault();
   //      var id = $(this).attr('id');
   //
   //      $.ajax({
   //          url: "ajax/destroy_session/"+id,
   //          success: function(data) {
   //              console.log('Success destroy ajax');
   //              if (data=="Done") {
   //                  $('a#'+id).closest('li').remove();
   //              }
   //          }
   //      });
   // });
    
    // $('a#close-popup').on("click", function(event) {
    //     event.preventDefault();
    //     document.getElementById("popup").style.width = "0%";
    // });

    /* set focus on first field in add view */
    $("input.focus-field").focus();
});