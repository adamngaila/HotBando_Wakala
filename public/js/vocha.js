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
                   // 
                    $('#pesapaypage_vocha').attr('src', redirectUrl);
                    $("#pesapal_payment_vocha").show();
                    alert('Payment process initiated, Transaction Id: ' + response.tcode + " for vocha of " + response.package + " value");
                    
                    

              /*   $('#pesapaypage_vocha').on('load', function() {
                        var newUrl = $(this).attr('src');
                        console.log('New URL in iframe:', newUrl);
                        window.parent.postMessage({ url: newUrl }, '*');
                        showNotification('URL in iframe changed: ' + newUrl);
                    });*/
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

    // Assume you have jQuery included in your project
$('#print_vocha').click(function() {
    var batch_id = $('#batch_id_input').val(); // Assuming you have batch_id stored as a data attribute

    $.ajax({
        url: '/export-vocha-printout',
        type: 'POST',
        data: {
            batch_id: batch_id
        },
        xhrFields: {
            responseType: 'blob' // Set the response type to blob
        },
        success: function(response) {
            // Convert the response to blob and create a blob URL
            var blob = new Blob([response], { type: 'application/pdf' });
            var url = window.URL.createObjectURL(blob);
            
            // Create a link element and trigger the download
            var a = document.createElement('a');
            a.href = url;
            a.download = 'vocha.pdf';
            document.body.appendChild(a);
            a.click();
            
            // Remove the link element
            window.URL.revokeObjectURL(url);
            $(a).remove();
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('An error occurred while exporting PDF.');
        }
    });
});

});
