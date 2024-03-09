$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
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
            url: "/sale_bando",
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
                    //add customer
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
                            
                            success:function(response)
                            {
                                if(response.status){
                                   
                                    $(form_mteja).trigger("reset");
                                    
                                    $("#mteja_signup").hide();
                                    $("#uza_button").attr('disabled', false);
                                    $("#vifurushi").attr('disabled', false);
                                    $("#Amount").attr('disabled', false);
                                    $("#approve").attr('disabled', false);
                                    $("#Customer_phone").attr('disabled', false);
                                    $("#payment").attr('disabled', false);


                                }else{
                                    alert(response.status);
                                    console.log(response.status);
                                }

                            }, error: function(response) {
                            }
                        });
                               
                    
                    
                    });
                }
             
               
            },
            error: function(response) {
                alert('Server ya HotBando ipo dowm tafadhali subiri');
                $(form).trigger("reset");
            }
        });
    });


});