@extends('layouts.home')

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">My reservations</h1>
  <p class="mb-4">List of all the busses reservations.</p>

  <a href="{{route('home.search')}}" class="btn btn-primary mb-4">Make A reservation</a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Reservations Datatable</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Bus Name</th>
              <th>From</th>
              <th>To</th>
              <th>Pending</th>
              <th>Rejected</th>
              <th>Created_at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection

@push('js')
<script>
  $('#dataTable').dataTable({
  processing:true,
  serverSide:true,
  ajax:"{{route('reservation.myReservationsApi')}}",
    columns:[
      {data:'id'},
      {data:'name'},
      {data:'from'},
      {data:'to'},
      {data:'pending'},
      {data:'rejected'},
      {data:'created_at'},
      {data:'actions',orderable:false,searchable:false},
    ]
  });
</script>
@endpush 