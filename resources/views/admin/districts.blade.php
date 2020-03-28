@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Addresses</h1>
  	<p class="mb-4">Districts</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          	<div class="row">
          		<div class="col-md-8">
          			<form class=" navbar-search">
			            <div class="input-group">
			              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
			              <div class="input-group-append">
			                <button class="btn btn-primary" type="button">
			                  <i class="fas fa-search fa-sm"></i>
			                </button>
			              </div>
			            </div>
			        </form>
          		</div>
          		<div class="col-md-4">
          			<span class="float-right">{{ $districts->links() }}</span>
          		</div>
          	</div>
        </div>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Sr. No</th>
			                <th>District Name</th>
			                <th>No. of Areas</th>
			                <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                    <th>Sr. No</th>
			                <th>District Name</th>
			                <th>No. of Areas</th>
			                <th>Action</th>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@php $sr = 1 @endphp
		            	@foreach($districts as $district)
		                <tr>
		                  <td>{{ $sr }}</td>
		                  <td>{{ $district->district_name }}</td>
		               	  <td>{{ App\Area::where('district_id',$district->id)->count() }}</td>
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
        <div class=" card-footer justify-content-center text-center">
        	{{ $districts->links() }}
        </div>
    </div>
</div>

@endsection