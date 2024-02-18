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