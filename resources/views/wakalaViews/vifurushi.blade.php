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

                        <option value="{{ $kifurushi->id }}" >{{ $kifurushi->Description}}, {{ $kifurushi->value}} , 'price = Tzs", {{ $kifurushi->amount}} </option>
                        @endforeach
                      </select>     

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
   
    

 @endsection