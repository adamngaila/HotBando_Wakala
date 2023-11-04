$(document).ready(function(){
    
    var form = '#add-sale-form';
    var form_mteja = '#add-mteja-form';
    
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
               
                alert(response.success);
                if(response.status_user == 'valid')
                {

                    alert(' bando la shg' + vifurushi + 'limeuzwa kwa '+response.mteja+ 'mwenye namba ' +simu);
                    $(form).trigger("reset");
                }
                if(response.status_user == 'invalid')
                {
                    $("#mteja_signup").show();
                    $("#uza_button").attr('disabled', true);
                    $("#vifurushi").attr('disabled', true);
                    $("#Amount").attr('disabled', true);
                    $("#approve").attr('disabled', true);
                    $("#Customer_phone").attr('disabled', true);
                    $("#payment").attr('disabled', true);
                }
             
               
            },
            error: function(response) {
            }
        });
    });


});