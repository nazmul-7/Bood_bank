@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Users</h1>
  	<p class="mb-4">All Emergency Donors</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Emergency Donors</h6>
        </div>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Name</th>
			                <th>Contact No</th>
			                <th>Blood Group</th>
			                <th>Weight</th>
			                <th>Gender</th>
			                <th>Donated Times</th>
			                <th>Join Date</th>
			                <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                  <th>Name</th>
			                <th>Contact No</th>
			                <th>Blood Group</th>
			                <th>Weight</th>
			                <th>Gender</th>
			                <th>Donated Times</th>
			                <th>Join Date</th>
			                <th>Action</th>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@foreach($users as $user)
		                <tr>
		                  <td>{{ $user->name }}</td>
		                  <td>{{ $user->phone }}</td>
		                  <td>{{ $user->blood_group }}</td>
		                  <td>{{ $user->weight }}</td>
		                  <td>@if($user->gender == 1) Male @else Female @endif</td>
		                  <td>{{ $user->total_donated }}</td>
		                  <td>{{ $user->created_at }}</td>
		                  <td>
		                  	<a href="{{ route('deleteUser',$user->id) }}" class="btn btn-sm btn-danger" >Delete</a>
		                  	<a href="{{ route('deleteUser',$user->id) }}" class="btn btn-sm btn-primary" >View</a>
		                  </td>
		                </tr>
                		@endforeach
              		</tbody>
            	</table>
          	</div>
        </div>
    </div>
</div>
@endsection