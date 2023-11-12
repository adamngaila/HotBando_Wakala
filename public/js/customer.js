$(document).ready(function(){


// retrive customers from local database

        
        $("#refresh").click(function() {
      
            
            $.ajax({
              url: '/local_customer_sync',
              type: 'post',
              data: {
              
                command: "snyc"
              },
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response) {
                alert( response.message);
                console.log(response);
              }
            });
           });

   
});