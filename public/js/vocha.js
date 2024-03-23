$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function showNotification(message) {
        // Create a div for notification
        var notification = $('<div>')
            .addClass('notification')
            .text(message)
            .hide();

        // Append notification to body and show with animation
        $('body').append(notification);
        notification.fadeIn();

        // Hide notification after 3 seconds
        setTimeout(function() {
            notification.fadeOut(function() {
                $(this).remove();
            });
        }, 3000);
    }

    var form = document.querySelector('#nunua-vocha-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        // Construct FormData object using the form
        var formData = new FormData(this);
        console.log(this);

        // Perform AJAX call
        $.ajax({
            url: "/purchase_vocha",
            method: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                var redirectUrl = response.redirect_url;

                if(response.status == 'good'){
                    alert('Payment process initiated, Transaction Id: ' + response.tcode + " for vocha of " + response.package + " value");
                    $('#pesapaypage_vocha').attr('src', redirectUrl);
                    $("pesapal_payment_vocha").show();

                 $('#pesapaypage_vocha').on('load', function() {
                        var newUrl = $(this).attr('src');
                        console.log('New URL in iframe:', newUrl);
                        window.parent.postMessage({ url: newUrl }, '*');
                        showNotification('URL in iframe changed: ' + newUrl);
                    });
                }
                if(response.status == 'bad'){
                    alert(response.status);
                    console.log(response.status);
                }
            },
            error: function(response) {
                console.log('Error:', response);
            }
        });
    });
});
