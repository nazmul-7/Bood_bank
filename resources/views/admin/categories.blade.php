@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Blog</h1>
  	<p class="mb-4">Blog Post Category</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Blog Post Category <span class="float-right"><a href="#" data-toggle="modal" data-target="#addCategoryModal" class="btn btn-primary">Add New Category</a></span></h6>
        </div>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Category Name</th>
			                <th>Status</th>
			                <th>Created Date</th>
			                <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                  	<th>Category Name</th>
			                <th>Status</th>
			                <th>Created Date</th>
			                <th>Action</th>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@foreach($categories as $category)
		                <tr>
		                  <td>{{ $category->category_name }}</td>
		                  <td>@if($category->status = 1) <span class="badge badge-primary">Active</span> @else <span class="badge badge-primary">Inactive</span> @endif</td>
		                  <td>{{ $category->created_at }}</td>
		                  <td>
		                  	<a href="{{ route('deleteCategory',$category->id) }}" class="btn btn-sm btn-danger" >Delete</a>
		                  	<a href="{{ route('blockCategory',$category->id) }}" class="btn btn-sm btn-dark" >Inactive</a>
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
          <h5 class="modal-title text-danger" id="exampleModalLabel">Add New Category</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div class="modal-body">
        	<form action="{{ route('addCategory') }}" method="POST">
        		@csrf
        		<div class="form-group">
        			<label>Category Name</label>
        			<input type="text" name="category_name" class="form-control" required>
        		</div>
        		<div class="form-group">
        			<input type="checkbox" name="status" value="1">
        			<label class="text-left">Active / inactive</label>
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
@endsection