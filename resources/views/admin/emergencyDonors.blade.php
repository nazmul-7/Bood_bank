@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Users</h1>
  	<p class="mb-4">All Emergency Donors</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          	<div class="row">
          		<div class="col-md-12">
          			<form class=" navbar-search">
			            <div class="input-group">
			              <div class="input-group-append">
			                <button class="btn btn-primary" type="button">
			                  <i class="fas fa-search fa-sm"></i>
			                </button>
			              </div>
			              <input type="text" id="search" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
			              
			            </div>
			        </form>
			        <div class="table-responsive" id="table-hide">
                        <table class="table table-striped table-bordered">
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
                            <tbody id="table-data">

                            </tbody>
                        </table>
                    </div>
          		</div>
          		
          	</div>
        </div>
        <script src="{{ asset('resource/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                $("#table-hide").hide();
             
	            fetch_customer_data();
	             
	            function fetch_customer_data(query = '')
	            {
	                $.ajax({
	                url:"{{ route('live_search.action') }}",
	                method:'GET',
	                data:{query:query},
	                dataType:'json',
	                success:function(data)
	                {
		                $("#table-hide").fadeIn("slow");
		                $('#table-data').html(data.table_data);
		                $('#total_records').text(data.total_data);
	                }
	              })
	            }

	             $(document).on('keyup', '#search', function(){
	              var query = $(this).val();
	              fetch_customer_data(query);
	            });
            });
        </script>
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
		                  	<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewModal-{{ $user->id }}" >View</a>
		                  	<a href="#"  data-toggle="modal" data-target="#blockModal-{{ $user->id }}" class="btn btn-sm btn-dark" >Block</a>
		                  	<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUserModal-{{ $user->id }}" >Delete</a>
		                  </td>
		                </tr>
                		@endforeach
              		</tbody>
            	</table>
          	</div>
        </div>
    </div>
</div>



@foreach($users as $user)
 <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	<h4>The user will be lost !!!</h4>
        	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-user').submit();"> Delete</a>
	          <form method="GET" id="delete-user" action="{{ route('deleteUser',$user->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach


@foreach($users as $user)
 <div class="modal fade" id="blockModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	<h4>User Might Need to register Again !!!</h4>
        	  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a href="#" class="btn btn-danger" onclick="document.getElementById('block-user').submit();"> Block</a>
	          <form method="GET" id="block-user" action="{{ route('blockUser',$user->id) }}">@csrf</form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
@endforeach


@foreach($users as $user)
 <div class="modal fade" id="viewModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">{{ $user->name }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	<ul class="list-group">
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Name
				    <span class="badge badge-success p-3">{{ $user->name }}</span>
				</li>
				
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Contact Number
				    <span class="badge badge-success p-3">{{ $user->phone }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Blood Group
				    <span class="badge badge-success p-3">{{ $user->blood_group }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Weight
				    <span class="badge badge-success p-3">{{ $user->weight }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Gender
				    <span class="badge badge-success p-3">@if($user->gender == 1) Male @else Female @endif</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Donated Time
				    <span class="badge badge-success p-3">{{ $user->total_donated }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Address
				    <span class="badge badge-success p-3">
				    	@php 

				    			$u = App\Address::where('user_id',$user->id)->first();

				    	@endphp
				    	{{ $u->area->district->district_name }}<br>{{ $u->area->area_name }}<br>{{ $u->address }}
				    </span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Email
				    <span class="badge badge-success p-3">{{ $user->email }}</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Facebook Url
				    <span class="badge badge-success p-3">{{ $user->facebook_url }}</span>
				</li>
			</ul>
			<div class="table table-responsive">
				<table>
					<thead>
						<th>Donation Date</th>
						<th>Added Date</th>
					</thead>
					<tbody>
						@php 
							$d = App\Donation::where('user_id',$user->id)->get();
						@endphp
						@foreach($d as $day)
							<tr>
								<td>{{ $day->donation_date }}</td>
								<td>{{ $day->created_at }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        	  
        </div>
        <div class="modal-footer">
            <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
            <a href="#" class="btn btn-primary" onclick="document.getElementById('block-user').submit();"> Block</a>
	        <form method="GET" id="block-user" action="{{ route('blockUser',$user->id) }}">@csrf</form>

	        <a href="#" class="btn btn-danger" onclick="document.getElementById('block-user').submit();"> Block</a>
	        <form method="GET" id="block-user" action="{{ route('blockUser',$user->id) }}">@csrf</form>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection