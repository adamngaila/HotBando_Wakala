@extends('layouts.adminpanel')
   

@section('content')
<div class="py-12">
              <div class="col-md-12 grid-margin">
                <div class="card"> 
                  <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">List of Wakala </h5>  <a href="{{ route('create_wakala_page') }}"> <button class="btn btn-icons border-0 p-2 float-right"  ><i class="icon-plus"></i></button>
</a>
                          <button class="btn btn-icons border-0 p-2 pull-right"><i class="icon-arrow-down-circle"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <table class="table table-bordered" id="wakala-list-table">
                      <thead>
                        <tr>
                      
                          <th>  User id </th>
                          <th> Wakala code </th>
                          <th> Name  </th>
                          <th> Adress </th>
                          <th> Phone </th>
                          <th> Commission </th>
                          <th> Target </th>
                          <th>Income</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($wakala as $result)
                  <tr>
                     
                     <td>{{$result->User_id}}</td>
                     <td>{{$result->Wakala_code}}</td>
                     <td>{{$result->name}}</td>
                     <td>{{$result->Adress}}</td>
                     <td>{{$result->Phone}}</td>
                     <td>{{$result->Wakala_commission}}</td>
                     <td>{{$result->Jumla_mauzo}}</td>
                     <td>{{$result->wakala_mapato}}</td>
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
