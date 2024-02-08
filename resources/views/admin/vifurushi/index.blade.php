@extends('layouts.adminpanel')
   

@section('content')
<div class="py-12">
              <div class="col-md-12 grid-margin">
                <div class="card"> 
                  <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">List of Vifurushi</h5> 
                           <a href="{{ route('show_create_vifurushi') }}" ><button class="btn btn-icons border-0 p-2 float-right" ><i class="icon-plus"></i></button>
</a>
                          <button class="btn btn-icons border-0 p-2 pull-right"><i class="icon-arrow-down-circle"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <table class="table table-bordered" id='wakala-list-table'>
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Description</th>
                          <th>Value</th>
                          <th> Amount Tzs </th>
                          <th> Targeted Users</th>
                          <th> Status</th>
                          <th> Expire Date</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($vifurushi as $result)
                  <tr>
                     <td>{{$result->id}}</td>
                     <td>{{$result->Description}}</td>
                     <td>{{$result->value}}</td>
                     <td>{{$result->amount}}</td>
                     <td>{{$result->target_user}}</td>
                     <td>{{$result->status}}</td>
                     <td>{{$result->expiration}}</td>
                     <td><button class="btn btn-icons border-0 p-2"><i class="icon-close"></i></button>
                     <button class="btn btn-icons border-0 p-2"><i class="icon-note"></i></button></td>
                  </tr>
                  @endforeach
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
         

    @endsection
