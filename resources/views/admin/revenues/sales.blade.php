@extends('layouts.adminpanel')
   

@section('content')
              <div class="col-md-12 grid-margin  stretch-card">
                <div class="card"> 
                  <div class="card-body">
             
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">SALES BOOK</h5>  
                          <button class="btn btn-icons border-0 p-2 pull-right"><i class="icon-arrow-down-circle"></i></button>
                        </div>
                    
                    <div class="row report-inner-cards-wrapper">
                    <div>
                    <table class="table table-bordered" id="sales-list-table" style="width:80%; word-wrap: break-word;">
                      <thead>
                        <tr>
                      
                          <th>  SALES ID</th>
                          
                          <th> Wakala code </th>
                          <th> Customer</th>
                          <th> Bando Type</th>
                          <th> Amount </th>
                          <th> Payment</th>
                          <th> Status </th>
                          <th> TIME </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($sales as $result)
                  <tr>
                     
                     <td>{{$result->Sales_id}}</td>
                     <td>{{$result->Wakala_code}}</td>
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
             
    @endsection
