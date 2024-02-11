@extends('layouts.panel')
   

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-12 bg-white border-b border-gray-200">
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card"  id="mteja_signup">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">NUNUA VIFURUSHI</h4>
                   
                    <form class="form-inline" data-action="" method ="POST" enctype="multipart/form-data" id="add-mteja-form">
                    @csrf
  
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Package</div>
                        </div>
                        <select class="form-control" class="form-control" id="vifurushi_list" name="vifurshi_list" placeholder="--chagua vifurushi -- ">
                        @foreach($vifurushi_list as $kifurushi)

                        <option value="{{ $kifurushi->id }}" >{{ $kifurushi->Description}} with {{ $kifurushi->value}} credits at price of Tzs {{ $kifurushi->amount}} </option>
                        @endforeach
                      </select>     

                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">PRICE</div>
                        </div>
                        <input type="text" class="form-control" id="price" name="price" placeholder=" " readonly>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">WAKALA ID</div>
                        </div>
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="{{$wakala_profile->Wakala_code}}" readonly>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">AMOUNT</div>
                        </div>
                        <input type="text" class="form-control" id="amnt" name="amnt" placeholder=" ">
                      </div>
    
                      <button type="submit" class="btn btn-primary mb-2" id='sajili'>NUNUA</button>
                     
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin  stretch-card">
                <div class="card"> 
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">TAARIFA ZA VIFURUSHI VYAKO</h5>

                          <button class="btn btn-icons border-0 p-2 pull-right" id ='refresh'><i class="icon- icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <div class="col-md-12">
                    <table class="table table-bordered" id="table-local-customer" style="width:80%; word-wrap: break-word;">
                      <thead>
                        <tr>
                      
                          <th>  # </th>
                          <th>   DESCRIPTION </th>
                          <th> SOLD</th>
                          <th> BALANCE </th>
                          <th> STATUS </th>
                           <th> EXPIRATION </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                     
                      <tr>
                      <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     
                    </tr>
                   
                      </tbody>
                    </table>
                  </div>
</div>
              
        </div>
        </div>
        </div>     
    </div>
    </div>

    @endsection
    @section('script')
   
    <script>
      
    document.getElementById('vifurushi_list').addEventListener('change', function() {
        var kifurushiId = this.value;
        if (kifurushiId) {
            // Make AJAX request to get product price
            $.ajax({
            
              url: '/get-kifurushi-price',
              type: 'POST',
              data: {
              
                kifurushiId: kifurushiId,
              },
            
              success: function(response) {
                document.getElementById('price').value = response.data.price;
                }error: function(response) {
                    console.error('Error fetching kifurushi price: ' +response.error);
                }
            });
           
        } else {
            // Reset the price textbox if no product is selected
            document.getElementById('price').value = '';
        }
    });
</script>

 @endsection