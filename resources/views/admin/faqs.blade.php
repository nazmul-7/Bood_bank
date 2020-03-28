@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  	<h1 class="h3 mb-2 text-gray-800">Faq</h1>
  	<p class="mb-4">Faq</p>
  	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Faq <span class="float-right"><a href="{{ route('addFaqs') }}" class="btn btn-primary">Add New Faq</a></span></h6>
        </div>
        <div class="card-body">
			<div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			        <thead>
		                <tr>
			                <th>Question</th>
			                <th>Answer</th>
			                <th>Created Date</th>
			                <th>Action</th>
		                </tr>
			        </thead>
			        <tfoot>
		                <tr>
		                  <th>Question</th>
                      <th>Answer</th>
                      <th>Created Date</th>
                      <th>Action</th>
		                </tr>
              		</tfoot>
		            <tbody>
		            	@foreach($faqs as $faq)
		                <tr>
		                  <td>{{ $faq->question }}</td>
		                  <td>{{ $faq->answer }}</td>
		                  <td>{{ $faq->created_at }}</td>
		                  <td>
		                  	<a href="#" data-toggle="modal" data-target="#DeleteFaqModal-{{ $faq->id }}" class="btn btn-sm btn-danger" >Delete</a>
		                  	<a href="" data-toggle="modal" data-target="#editFaqModal-{{ $faq->id }}" class="btn btn-sm btn-primary" >Edit</a>
		                  </td>
		                </tr>
                		@endforeach
              		</tbody>
            	</table>
          	</div>
        </div>
    </div>
</div>


@foreach($faqs as $faq)
 <div class="modal fade" id="DeleteFaqModal-{{ $faq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="center" class="modal-body">
          <h4>The Question will be lost !!!</h4>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a href="#" class="btn btn-danger" onclick="document.getElementById('delete-question').submit();"> Delete</a>
            <form method="GET" id="delete-question" action="{{ route('deleteFaq',$faq->id) }}">@csrf</form>
        </div>
        <div class="modal-footer align-items-center">
          
        </div>
      </div>
    </div>
  </div>
@endforeach


@foreach($faqs as $faq)
  <div class="modal fade" id="editFaqModal-{{ $faq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Add New Category</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </div>
        <div align="left" class="modal-body">
          <form action="{{ route('editFaq',$faq->id) }}" method="POST" class="form p-2">
            @csrf
            <div class="form-group">
              <label>Question</label>
              <input type="text" name="question" value="{{ $faq->question }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Answer</label>
              <input type="text" name="answer" class="form-control" value="{{ $faq->answer }}" required>
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

@endforeach
@endsection