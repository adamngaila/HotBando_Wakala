$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var form = '#nunua-vocha-form';

    $(form).on('submit', function(event){
        event.preventDefault();

    });

    $.ajax({
        url: "/purchase_vocha",
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success:function(response)
          {
              
              var redirectUrl = response.redirect_url;

              if(response.status == 'good'){
                 
                //  $(form_mteja).trigger("reset");
          
                  alert('Payment process initiated, Transaction Id:'+ response.tcode +"for vocha of "+ response.package +" value");
                  
                  $('#pesapaypage_vocha').attr('src',  redirectUrl);

                  $("pesapal_payment_vocha").show();

                  $('#pesapaypage').on('load', function() {
                      var newUrl = $(this).attr('src');
                      console.log('New URL in iframe:', newUrl);
                      alert('New URL in iframe:', newUrl);

                      window.parent.postMessage({ url: newUrl }, '*');

                      showNotification('URL in iframe changed: ' + newUrl);
                  });
                 
              }
             if(response.status == 'bad'){
                  alert(response.status);
                  console.log(response.status);
              }
             
          }, error: function(response) {
          }
        })

})