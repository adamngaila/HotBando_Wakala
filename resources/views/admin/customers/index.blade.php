@extends('layouts.adminpanel')
   

@section('content')
<div class="py-12">
              <div class="col-md-12 grid-margin">
                <div class="card overflow-auto"> 
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">List of Customers from local db </h5> <button class="btn btn-icons border-0 p-2 float-right"  ><i class="icon-plus"></i></button>

                          <button class="btn btn-icons border-0 p-2 pull-right"><i class="icon-arrow-down-circle"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                    <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="table-local-customer">
                      <thead>
                        <tr>
                      
                          <th>   id </th>
                          <th>   Name </th>
                          <th> Online</th>
                          <th> Phone </th>
                          <th> Adress </th>
                          <th> Download-used </th>
                          <th> Upload-used </th>
                          <th> Last seen </th>
                      
                          <th> Status Disable </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $result)
                      
                      <tr>
                         <td>{{$result['.id']}}</td>
                         <td>{{ !empty($result['first-name']) ? $result['first-name'] : 'No information' }}</td>
                         <td>{{$result['active']}}</td>
                         <td>{{$result['username']}}</td>
                         <td>{{ !empty($result['email']) ? $result['email'] : 'No information'}}</td>
                         <td>{{  !empty($result['download-used']) ? $result['download-used'] : 'No information'}}</td>
                         <td>{{  !empty($result['upload-used']) ? $result['upload-used'] : 'No information'}}</td>
                         <td>{{$result['last-seen']}}</td>
                         
                         <td>{{$result['disabled']}}</td>
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
    @section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/customer.js')  }}"defer ></script>
    

 @endsection