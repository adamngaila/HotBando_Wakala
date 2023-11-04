@extends('layouts.adminpanel')
   

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
                          <h4>Tzs 0</h4>
                          <span class="report-count"> 2 Reports</span>
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
                          <h4>%</h4>
                          <span class="report-count"> 5 Reports</span>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">MAPATO</span>
                          <h4>Tzs 0</h4>
                          <span class="report-count"> 9 Reports</span>
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
                   
                    <form class="form-inline">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                      <div class="input-group-text" >Simu</div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputName2" placeholder="+255">
                        </div>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                      <div class="input-group-text" >Bando</div>
                      </div>
                      <select class="form-control" id ="vifurushi">
                                <option>500</option>
                                <option>1000</option>
                                <option>1500</option>
                                <option>2000</option>
                              </select>
                              </div>
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Amount</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Tzs</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="0.0">
                      </div>
                      <div class="form-check mx-sm-2">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" checked> Authorize </label>
                      </div>
                      <button type="submit" class="btn btn-primary mb-2">Uza</button>
                    </form>
                  </div>
                </div>
              </div>
        </div>
        
    </div>

    @endsection
