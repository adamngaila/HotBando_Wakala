@extends('layouts.panel')
   

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-12 bg-white border-b border-gray-200">
            <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">FANYA MAUZO</h4>
                   
                    <form class="form-inline" data-action="{{ route('sale_bando') }}" method ="POST" enctype="multipart/form-data" id="add-sale-form">
                    @csrf
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                      <div class="input-group-text" >Simu</div>
                      </div>
                      <input type="text" class="form-control" id="Customer_phone" name='Customer_phone' placeholder="+255">
                        </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                      <div class="input-group-text" >Bando</div>
                      </div>
                      <select class="form-control" id ="vifurushi" name="vifurushi">
                                 <option value= 500.0>6hrs of unlimited Internet @ 500/=</option>
                                <option value= 1000.0>24hrs  of unlimited Internet @ 1000 /=</option>
                                <option value= 6000.0>6000 7days of unlimited Internet @ 6000/=</option>
                                <option value= 45000.0>30 days  of unlimited Internet for 5 users @ 45000/=</option>
                              </select>
                              </div>
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Amount</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Tzs</div>
                        </div>
                        <input type="text" class="form-control" id="Amount" name="Amount" placeholder="0.0">
                      </div>
                      <div class="form-check mx-sm-2">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" value='Cash' id='payment' name='payment' > Cash </label>
                      </div>
                      <div class="form-check mx-sm-2">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" value='Approved' id='approve' name='approve' > Authorize </label>
                      </div>
                      <button type="submit" class="btn btn-primary mb-2" id='uza_button'>Uza</button>
                      <input type="text" class="form-control" style='display:none;' id="wakala_code" name="wakala_code" value = "{{ $wakala_profile->Wakala_code}}" >
                    </form>
                  </div>
                </div>
              </div>
        
              <div class="col-12 grid-margin stretch-card" style='display:none;' id="mteja_signup">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">ONGEZA TAARIFA ZA MTEJA</h4>
                   
                    <form class="form-inline" data-action="{{ route('local_customer_signup') }}" method ="POST" enctype="multipart/form-data" id="add-mteja-form">
                    @csrf
  
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Simu</div>
                        </div>
                        <input type="text" class="form-control" id="simu" name="simu" placeholder=" " >
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Jina</div>
                        </div>
                        <input type="text" class="form-control" id="jina" name="jina" placeholder=" ">
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">email</div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder=" " >
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Password</div>
                        </div>
                        <input type="text" class="form-control" id="pwd" name="pwd" placeholder=" ">
                      </div>
    
                      <button type="submit" class="btn btn-primary mb-2" id='sajili'>Sajili</button>
                      <input type="text" class="form-control" style='display:none;' id="wakala_code" name="wakala_code"  value = "{{ $wakala_profile->Wakala_code}}" >
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
                          <h5 class="font-weight-semibold">Mauzo </h5>

                          <button class="btn btn-icons border-0 p-2 pull-right" id ='refresh'><i class="icon- icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <div class="col-md-12">
                    <table class="table table-bordered" id="table-local-mauzo" style="width:80%; word-wrap: break-word;">
                      <thead>
                        <tr>
                      
                          <th>   Mauzo Code </th>
                          <th>   Customer Id </th>
                          <th>   Customer Phone</th>
                          <th> Kifurushi</th>
                          <th> Amount </th>
                           <th> Malipo </th>
                           <th> Authorization</th>
                           <th> Time </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($mauzo as $result)
                      
                      <tr>
                      <td>{{$result->Sales_id}}</td>
                     <td>{{$result->Customer_id}}</td>
                     <td>{{$result->Customer_phone}}</td>
                     <td>{{$result->Package_type}}</td>
                     <td>{{$result->Amount}}</td>
                     <td>{{$result->Payment_Type}}</td>
                     <td>{{$result->Authorization_Status}}</td>
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
 