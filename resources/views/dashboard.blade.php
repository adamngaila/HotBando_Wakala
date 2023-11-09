@extends('layouts.panel')
   

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-12 bg-white border-b border-gray-200">
             <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">MAUZO</span>
                          <h4>Tzs </h4>
                          <span class="report-count"> 0 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">WATEJA</span>
                          <h4>0</h4>
                          <span class="report-count"> 3 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-people"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">COMMISSION</span>
                          <h4>{{ $wakala_profile->Wakala_commission}}</h4>
                          <span class="report-count"> 1 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">MAPATO</span>
                          <h4>Tzs </h4>
                          <span class="report-count"> 0 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-diamond"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
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
                    </form>
                  </div>
                </div>
              </div>
              
        </div>
        
    </div>

    @endsection
    @section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/sales-ajax.js') }}" defer></script>

 @endsection