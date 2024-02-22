$(document).ready(function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    var form_nunua = '#nunua-package-form';

 // payment function
    
    $(form_nunua).on('submit', function(event){
        event.preventDefault();
        
        $.ajax({

            url:"/purchase_kifurushi",
            method: 'POST',
            data: new FormData(this),
           dataType: 'JSON',
           contentType: false,
           cache: false,
           processData: false,
           
            success:function(response)
            {
                
                var redirectUrl = response.redirect_url;

                if(response.status == 'good'){
                   
                  //  $(form_mteja).trigger("reset");
            
                    alert('Payment process initiated, Transaction Id:'+ response.tcode +"for package of "+ response.package +" MBPS");
                    
                    $('#pesapaypage').attr('src',  redirectUrl);

                    $("#pesapal_payment").show();
                    window.parent.postMessage({ url: window.location.href }, '*');
                   
                }
               if(response.status == 'bad'){
                    alert(response.status);
                    console.log(response.status);
                }
                window.addEventListener('message', function(event) {
                    // Check if the message is from the iframe and contains the new URL
                    if (event.source === iframe.contentWindow && event.data.url) {
                        // Handle the new URL here
                        var newUrl = event.data.url;
                        alert('New URL in iframe:', newUrl);
                
                        // Send a request or perform any action based on the new URL
                        // Example: Send an AJAX request
                        
                    }
                });
            }, error: function(response) {
            }
        });
               
    });

//vifurushi list function
document.getElementById('vifurushi_list').addEventListener('change', function() {
    var kifurushiId = this.value;
    if (kifurushiId) {
        // Make AJAX request to get product price
      
        axios.get('get-kifurushi-price/' + kifurushiId)
        .then( function(response) {
            document.getElementById('price').value = response.data.price;
          })
            .catch(function(error) {
                console.error('Error fetching kifurushi price: ' +response.error);
            
          });
    } else {
        // Reset the price textbox if no product is selected
        document.getElementById('price').value = '';
    }
});
})