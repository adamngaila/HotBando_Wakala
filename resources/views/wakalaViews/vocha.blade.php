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
                    <h4 class="card-title">NUNUA VOCHA</h4>
                          @if(session('payment_success'))
                            <div class="alert alert-success">
                          {{ session('payment_success') }}
                          </div>
                          @endif
                          @if(session('payment_failed'))
                          <div class="alert alert-danger" role="alert">
                          {{ session('payment_failed') }}
                          </div>
                        @endif
                        
                     <form class="form-inline" data-action="{{ route('purchase_vocha') }}" method ="POST" enctype="multipart/form-data" id="nunua-vocha-form">
                     @csrf
  
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text font-weight-semibold">Vocha</div>
                        </div>
                        <select class="form-control" class="form-control" id="vocha_list" name="vocha_list" placeholder="--chagua vifurushi -- ">
                        <option value= 500.0>500 package @ 500/=</option>
                                <option value= 1000.0>1,000 package @ 1000 /=</option>
                                <option value= 2000.0>2,000 package @ 2000/=</option>
                                <option value= 5000.0>package @ 5,000/=</option>
                                <option value= 10000.0>package @ 10,000/=</option>
                      </select>     

                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Idadi</div>
                        </div>
                        <input type="text" class="form-control" id="qty" name="qty" placeholder=" " >
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">WAKALA ID</div>
                        </div>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="{{$wakala_profile->Wakala_code}}" readonly>
                      </div>
            
                      <button type="submit" class="btn btn-primary mb-2" id='nunua_vocha'>NUNUA</button>
                     
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin stretch-card" style='display:none;' id="pesapal_payment_vocha">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">MALIPO</h4>
                    <iframe  width="100%" height="300" style="border:none;" id="pesapaypage_vocha" >
                  </iframe>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin stretch-card" id="vocha-display">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">VOCHA</h4>
                
                      @if($vocha_details)
                      <p>Batch ID: {{ $vocha_details->batch_id }}</p>
                    
                      <p>Voucher Value: {{ $vocha_details->voucher_value }}</p>
                      <input type="hidden" class="form-control" id="batch_id_input" name="batch_id_input" value="{{ $vocha_details->batch_id }}">
                     <button type="submit" class="btn btn-primary mb-2" id='print_vocha'>Print</button>
                    
                  
                  
                         @else
                         <p>No data available</p>
                          @endif
                    
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin  stretch-card">
                <div class="card"> 
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">TAARIFA ZA MIAMALA YA VOCHA</h5>

                          <button class="btn btn-icons border-0 p-2 pull-right" id ='refresh'><i class="icon- icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <div class="col-md-12">
                    <table class="table table-bordered" id="table-local-customer" style="width:80%; word-wrap: break-word;">
                      <thead>
                        <tr>
                      
                          <th>Mcode</th>
                          <th>   Tracking code </th>
                          <th>Package</th>
                          <th> Quantity </th>
                          <th> Amount </th>
                          <th> Status </th>
                           <th> Time </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($vocha_miamala as $result)
                      <tr>
                      <td>{{$result->Transaction_id}}</td>
                     <td>{{$result->Transaction_request_id}}</td>
                     <td>{{$result->Vocha_Value}}</td>
                     <td>{{$result->Vocha_Qty}}</td>
                     <td>{{$result->Amount}}</td>
                     <td>{{$result->Transaction_status}}</td>
                     <td>{{$result->created_at}}</td>
                    
                    </tr>
                    @endforeach
                      
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
    
  
    
 @endsection