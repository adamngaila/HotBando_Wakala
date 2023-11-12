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
                          <h5 class="font-weight-semibold">List of Customers </h5>

                          <button class="btn btn-icons border-0 p-2 pull-right" id ='refresh'><i class="icon- icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <div class="col-md-12">
                    <table class="table table-bordered" id="table-local-customer" style="width:80%; word-wrap: break-word;">
                      <thead>
                        <tr>
                      
                          <th>   Customer id </th>
                          <th>   Name </th>
                          <th> Online</th>
                          <th> Phone </th>
                          <th> Password </th>
                           <th> Wakala </th>
                           <th> Last seen </th>
                           <th> Uptime used </th>
                      
                          <th> Status Disable </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($customers as $result)
                      
                      <tr>
                      <td>{{$result->Customer_id}}</td>
                     <td>{{$result->Name}}</td>
                     <td>{{$result->Status_Online}}</td>
                     <td>{{$result->Phone}}</td>
                     <td>{{$result->password}}</td>
                     <td>{{$result->Wakala_code}}</td>
                     <td>{{$result->last_seen}}</td>
                     <td>{{$result->uptime_used}}</td>
                     <td>{{$result->Status_Disabled}}</td>
                    
    
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