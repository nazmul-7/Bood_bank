@extends('layouts.admin')

@section('content')



<div class="container">
  <h1 class="h3 mb-2 text-gray-800">FAQ</h1>
  <p class="mb-4">Add Faq</p>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Add New Faq</h1>
            </div>
            <form class="user" action="{{ route('addFaqStore') }}" method="POST">
              @CSRF
              @if($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              
              <div class="form-group">
                <input type="text" name="question" class="form-control" id="exampleInputEmail" placeholder="Enter Question">
              </div>

              <div class="form-group">
                <input type="text" name="answer" class="form-control" id="exampleInputEmail" placeholder="Provide Answer">
              </div>
             
              <button type="submit" class="btn btn-primary">
                Add Faq
              </button>
            </form>
            <div class="text-center">
              <a class="small" href="{{ route('faqs') }}">See All Faq</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection