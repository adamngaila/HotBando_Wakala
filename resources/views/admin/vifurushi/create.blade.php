@extends('layouts.adminpanel')
   

@section('content')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-12 bg-white border-b border-gray-200">
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card"  id="mteja_signup">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">CREATE VIFURUSHI</h4>
                   
                    <form class="form-inline" data-action="" method ="POST" enctype="multipart/form-data" id="add-mteja-form">
                    @csrf
  
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Description</div>
                        </div>
                        <input type="text" class="form-control" id="Description" name="Description" placeholder=" " >
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Value</div>
                        </div>
                        <input type="text" class="form-control" id="value" name="value" placeholder=" ">
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Price</div>
                        </div>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder=" " >
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Targeted User</div>
                        </div>
                        <select class="form-control" class="form-control" id="target_user" name="target_user" placeholder=" ">
                              <option value= "Wakala">Wakala or Middle men</option>
                             <option value= "Customer">End User</option>
                             <option value= "Offer">Offer</option>
                        </select>
                      </div>
    
                      <button type="submit" class="btn btn-primary mb-2" id='sajili'>Save</button>
                      <input type="text" class="form-control" style='display:none;' id="wakala_code" name="wakala_code"  value = "" >
                    </form>
                  </div>
                </div>
              </div>
</div>
</div>
</div>
</div>
         

    @endsection
