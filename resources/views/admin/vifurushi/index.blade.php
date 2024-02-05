@extends('layouts.adminpanel')
   

@section('content')
<div class="py-12">
              <div class="col-md-12 grid-margin">
                <div class="card"> 
                  <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">List of Admin users</h5>  <button class="btn btn-icons border-0 p-2 float-right" ><i class="icon-plus"></i></button>
                         
                          <button class="btn btn-icons border-0 p-2 pull-right"><i class="icon-arrow-down-circle"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <table class="table table-bordered" id='admin-list-table'>
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>  User id </th>
                          <th> Name </th>
                          <th> Adress </th>
                          <th> Phone </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($admin as $result)
                  <tr>
                     <td>{{$result->id}}</td>
                     <td>{{$result->User_id}}</td>
                     <td>{{$result->name}}</td>
                     <td>{{$result->Adress}}</td>
                     <td>{{$result->Phone}}</td>
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
