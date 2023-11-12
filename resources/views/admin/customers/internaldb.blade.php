@extends('layouts.adminpanel')
   

@section('content')
<div class="py-12">
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
                    <table class="table table-bordered" id="sales-list-table" style="width:80%; word-wrap: break-word;">
                      <thead>
                        <tr>
                      
                          <th>   Customer id </th>
                          <th>   Name </th>
                          <th> Online</th>
                          <th> Phone </th>
                           <!-- <th> Adress </th> -->
                          
                          <th> Last seen </th>
                      
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

                     <td>{{$result->last_seen}}</td>
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

    @endsection
    
 