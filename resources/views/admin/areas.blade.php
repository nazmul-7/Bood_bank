@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Addresses</h1>
  	<p class="mb-4">Area</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h4 class="m-0 text-primary">All Area <span class="float-right"><a href="{{ route('addAddress') }}" class="btn btn-primary">Add New Area</a></span></h4>
        </div>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Sr. No</th>
			                <th>Area Name</th>
                            <th>District Name</th>
			                <th>No. of Donors</th>
			                <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                  <th>Sr. No</th>
			                <th>Area Name</th>
                            <th>District Name</th>
			                <th>No. of Donors</th>
			                <th>Action</th>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@php $sr = 1 @endphp
		            	@foreach($areas as $area)
		                <tr>
		                  <td>{{ $sr }}</td>
		                  <td>{{ $area->area_name }}</td>
                      <td>{{ $area->district->district_name }}</td>
		               	  <td>{{ App\Address::where('area_id',$area->id)->count() }}</td>
		                  <td>
		                  	<a href="" class="btn btn-sm btn-primary" >View</a>
		                  </td>
		                </tr>
		                @php $sr++ @endphp
                		@endforeach

              		</tbody>
            	</table>
          	</div>
        </div>
    </div>
</div>


@endsection