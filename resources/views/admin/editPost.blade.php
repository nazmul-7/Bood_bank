@extends('layouts.admin')

@section('content')

<div class="container">
  <h1 class="h3 mb-2 text-gray-800">Blog</h1>
  <p class="mb-4">Edit Post</p>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edit Post</h1>
            </div>
            <form class="user" action="{{ route('editPostStore',$post->id) }}" method="POST" enctype="multipart/form-data">
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
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="title" placeholder="Enter title">
              </div>

              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <label for="categories">Category</label>
                  <select name="category_name" class="form-control" id="categories">
                    
                    <option selected value="{{ $post->category->id }}">{{ $post->category->category_name }}</option>
                    <option selected disabled> Select Category</option>
                    @foreach($categories as $category)
                      
                      <option value="{{ $category->id }}" selected="selected">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

                <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                <script type="text/javascript">
                    tinymce.init({
                      selector: '#mytextarea'
                    });
                </script>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea name="body" id="mytextarea" class="form-control">{{ $post->body }}</textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <label for="image">Add An Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <img src="{{ asset($post->image) }}" height="50">
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection