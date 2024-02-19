$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    

    var form = '#nunua-package-form';

 // payment function
    
    $(form).on('submit', function(event){
        event.preventDefault();
        
        $.ajax({

            url:'/purchase_kifurushi',
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
                if(response.status == 'good'){
                   
                  //  $(form_mteja).trigger("reset");
                  
                    alert('Payment process initiated, Transaction Id:'+ response.tcode +"for package of "+ response.package +" MBPS");
                    $("#pesapal_payment").show();
                    document.getElementById('jina').src = response.redirect_url;
                }
               if(response.status == 'good'){
                    alert(response.status);
                    console.log(response.status);
                }
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