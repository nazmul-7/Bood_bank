@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Emergency Contacts</h1>
  	<p class="mb-4">Emergency Contacts</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Emergency Contacts<span class="float-right"><a href="#" data-toggle="modal" data-target="#addCategoryModal" class="btn btn-primary">Add Emergency Contacts</a></span></h6>
        </div>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Contact Name</th>
			                <th>Contact Number</th>
                      <th>Priority Status</th>
			                <th>Created Date</th>
			                <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                  <th>Contact Name</th>
                      <th>Contact Number</th>
                      <th>Priority Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@foreach($emergencies as $emergency)
		                <tr>
		                  <td>{{ $emergency->contact_name }}</td>
                      <td>{{ $emergency->contact_number }}</td>
                      <td>
                        @if($emergency->priority_status == 0) <span class="badge badge-dark badge-round">Normal</span> @else <span class="badge badge-danger badge-round">Top</span> @endif
                      </td>
		                  <td>{{ $emergency->created_at }}</td>
		                  	<td>
                          <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditEmergency-{{ $emergency->id }}" >Edit</a>
                          <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEmergencyContactModal-{{ $emergency->id }}" >Delete</a>
                        </td>
		                </tr>
                		@endforeach
              		</tbody>
            	</table>
          	</div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Add New Emergency Contact</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div class="modal-body">
        	<form action="{{ route('AddEmergencyContact') }}" method="POST">
        		@csrf
        		<div class="form-group">
        			<label>Contact Name</label>
        			<input type="text" name="contact_name" class="form-control" required>
        		</div>
            <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="contact_number" class="form-control" required>
            </div>
        		<div class="form-group">
              <label>Priority</label>
              <select name="priority_status" class="form-control">
                <option selected disabled> Choose Priority </option>
                <option value="1"> Top </option>
                <option value="0"> Normal </option>
              </select>
        		</div>
        		<div class="form-group">
        			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
        		</div>
        	</form>
        </div>
        <div class="modal-footer align-items-center">
          	<button class="close" type="button" data-dismiss="modal" aria-label="Close">Close</button>
        </div>
      </div>
    </div>
  </div>


@foreach($emergencies as $emergency)
 <div class="modal fade" id="deleteEmergencyContactModal-{{ $emergency->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
          <h4>The Contact will be lost !!!</h4>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-emergency-contact').submit();"> Delete</a>
            <form method="GET" id="delete-emergency-contact" action="{{ route('deleteEmergencyContact',$emergency->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach


@foreach($emergencies as $emergency)
 <div class="modal fade" id="EditEmergency-{{ $emergency->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">{{ $emergency->contact_name }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div class="modal-body">
          
          <form action="{{ route('EditEmergencyContact',$emergency->id) }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Contact Name</label>
              <input type="text" name="contact_name" value="{{ $emergency->contact_name }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Contact Number</label>
              <input type="text" name="contact_number" value="{{ $emergency->contact_number }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Priority</label>
              <select name="priority_status" class="form-control">
                <option value="{{ $emergency->priority_status }}" selected> 
                   @if($emergency->priority_status == 0) Normal @else Top @endif
                </option>
                <option value="1"> Top </option>
                <option value="0"> Normal </option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
          </form>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
@endforeach



@endsection