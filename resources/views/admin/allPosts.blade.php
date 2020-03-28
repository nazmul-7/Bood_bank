@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Blog</h1>
  	<p class="mb-4">All Posts</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
        </div>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Sr</th>
			                <th>Title</th>
			                <th>Category</th>
			                <th>Description</th>
			                <th>Image</th>
			                <th>Post Date</th>
			                <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                  	<th>Sr</th>
		                  	<th>Title</th>
			                <th>Category</th>
			                <th>Description</th>
			                <th>Image</th>
			                <th>Post Date</th>
			                <th>Action</th>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@php $sr = 1 @endphp
		            	@foreach($posts as $post)
		                <tr>
		                  <td>{{ $sr }}</td>
		                  <td>{{ $post->title }}</td>
		                  <td>{{ $post->category->category_name }}</td>
		                  <td>{!! $post->body !!}</td>
		                  <td><img src="{{ asset($post->image) }}"  height="50"></td>
		                  <td>{{ $post->created_at }}</td>
		                  <td>
		                  	<a href="#" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#viewModal-{{ $post->id }}" >View</a>
		                  	<a href="{{ route('editPost',$post->id) }}" class="btn btn-sm btn-primary" >Edit</a>
		                  	<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePostModal-{{ $post->id }}" >Delete</a>

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


@foreach($posts as $post)
 <div class="modal fade" id="deletePostModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	          <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-post').submit();"> Delete</a>
	          <form method="GET" id="delete-post" action="{{ route('deletePost',$post->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach

@foreach($posts as $post)
 <div class="modal fade" id="viewModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">{{ $post->title }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
        	
			<div class="title">
				<h3>{{ $post->title }}</h3>
				<p>{{ $post->created_at }}</p>
			</div>
			<div class="body">
				<img src="{{ asset($post->image) }}" class="image-responsive" style="height: 50%; width: 50%;">
				<p>
					{!! $post->body !!}
				</p>
			</div>
        	  
        </div>
        <div class="modal-footer">
            <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
	        <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-post').submit();"> Delete</a>
	        <form method="GET" id="delete-post" action="{{ route('deletePost',$post->id) }}">@csrf</form>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection