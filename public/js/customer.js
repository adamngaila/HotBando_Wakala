$(document).ready(function(){


// retrive customers from local database

        var url ="{{ route('local_customer_fetch') }}";

        $.ajax({
            url: "/local_customer_fetch",
            type: 'GET',
           
            success: function(response) {
                var list_customers = "";
               var res=JSON.parse(response);
      
              
                conssole.log(res[1]['active']);
              
            },
            error: function(response) {
                alert('failed');
            }
        });
        
   /*
   
                response.forEach(function(res)
                {
                list_customers += '<tr>'+
                '<td>'+ res[0]+'</td>'+
                '<td>'+ res[1] +'</td>'+
                '<td>'+ res[2] +'</td>'+
                '<td>'+ res[3] +'</td>'+
                '<td>'+ res[1] +'</td>'+
                '<td>'+ res[1] +'</td>'+
                '<td>'+res[1]+'</td>'+
                '<td>'+ res[1] +'</td>'+
                '<td>'+ res[1]+'</td>'+
                '</tr>';
              
               });
               $('#table-local-customer').html(list_customers);*/ 
});