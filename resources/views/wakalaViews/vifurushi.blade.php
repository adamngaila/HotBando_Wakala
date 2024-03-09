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
                        
                     <form class="form-inline" data-action="{{ route('purchase_kifurushi') }}" method ="POST" enctype="multipart/form-data" id="nunua-package-form">
                     @csrf
  
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text font-weight-semibold">Package</div>
                        </div>
                        <select class="form-control" class="form-control" id="vifurushi_list" name="vifurshi_list" placeholder="--chagua vifurushi -- ">
                        <option value="">--select----</option>
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
                        <input type="text" class="form-control" id="user_id" name="user_id" value="{{$wakala_profile->Wakala_code}}" readonly>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">QTY</div>
                        </div>
                        <input type="text" class="form-control" id="qty" name="qty" placeholder="1">
                      </div>
                      <input type="hidden" class="form-control" id="value" name="value" value="{{ $kifurushi->value}}">
    
                      <button type="submit" class="btn btn-primary mb-2" id='nunua'>NUNUA</button>
                     
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin stretch-card" style='display:none;' id="pesapal_payment">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">MALIPO</h4>
                    <iframe  width="100%" height="300" style="border:none;" id="pesapaypage" >
                  </iframe>
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
                      
                          <th>Mcode</th>
                          <th>   Tracking code </th>
                          <th>Package</th>
                          <th> Amount </th>
                          <th> Status </th>
                           <th> Time </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($vifurushi_miamala as $result)
                      <tr>
                      <td>{{$result->Transaction_id}}</td>
                     <td>{{$result->Transaction_request_id}}</td>
                     <td>{{$result->Value}}</td>
                     <td>{{$result->Amount}}</td>
                     <td>{{$result->Transaction_status}}</td>
                     <td>{{$result->created_at}}</td>
                    
                    </tr>
                    @endforeach
                      </tbody>
                    </table>
                  </div>
</div>
<div class="col-md-12 grid-margin  stretch-card">
                <div class="card"> 
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">TAARIFA YA MFUKO</h5>

                          <button class="btn btn-icons border-0 p-2 pull-right" id ='refresh'><i class="icon- icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <div class="col-md-12">
                    <table class="table table-bordered" id="table-local-customer" style="width:80%; word-wrap: break-word;">
                      <thead>
                        <tr>
                      
                          <th>Vifurushi vilivyonunuliwa</th>
                          <th>Vifurushi vilivyouzwa</th>
                          <th>Vifurushi vilivyokopwa</th>
                          <th>Salio</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      
                      <tr>
                      <td>{{$vifurushi_wallet->Purchased_vifurushi}}</td>
                     <td>{{$vifurushi_wallet->Sold_vifurushi}}</td>
                     <td>{{$vifurushi_wallet->Credit_vifurushi}}</td>
                     <td>{{$vifurushi_wallet->Vifurushi_balance}}</td>
                   
                     
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script src="{{ asset('js/vifurushi.js') }}" defer></script>
    
 @endsection