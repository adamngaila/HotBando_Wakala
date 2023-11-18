$(document).ready(function(){
  var form_mteja = '#add-mteja-form';

// sync customers from local database     
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
      

         //add new user
         $(form_mteja).on('submit', function(event){          
          event.preventDefault();
          var link = $(this).attr('data-action');
          var simu = document.getElementById('simu').value;
          var jina = document.getElementById('jina').value;
          var email = document.getElementById('email').value;
          var pwd = document.getElementById('pwd').value;
          $.ajax({

              url: "/local_customer_signup",
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
                  if(response.status == 'ok'){
                     
                      $(form_mteja).trigger("reset");
                    
                      alert('new user has been added successifully');
                  }else{
                      alert(response.status);
                      console.log(response.status);
                  }

              }, error: function(response) {
              }
          });
                 
      
      
      });

 
});