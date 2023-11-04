$(document).ready(function(){
    
    var form = '#add-sale-form';
    
   



    $(form).on('submit', function(event){
        event.preventDefault();

        var url = $(this).attr('data-action');
        var vifurushi = document.getElementById('vifurushi').value;
        var Amount = document.getElementById('Amount').value;
        var customer_id = document.getElementById('Customer_phone').value;
       
        //   var vifurushi = document.getElementById('vifurushi').value;
        var payment = document.getElementById('payment').value;
        var approve = document.getElementById('approve').value;
        var BASE_URL = window.location.origin;
        var simu = document.getElementById('Customer_phone').value;
       
    

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                $(form).trigger("reset");
                alert(response.success);
             
                alert(' bando la shg' + vifurushi + 'limeuzwa kwa' +simu);
            },
            error: function(response) {
            }
        });
    });

});