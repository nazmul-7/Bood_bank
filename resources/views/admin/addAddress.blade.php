@extends('layouts.admin')

@section('content')



<div class="container">
  <h1 class="h3 mb-2 text-gray-800">Locations</h1>
  <p class="mb-4">Add Area</p>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Add New Area</h1>
            </div>
            <form class="user" action="{{ route('addAddressStore') }}" method="POST">
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
              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <select name="district" class="form-control">
                    <option selected disabled> Select District</option>
                    @foreach($districts as $district)
                      <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <input type="text" name="area_name" class="form-control" id="exampleInputEmail" placeholder="Enter Area Name">
              </div>
             
              <button type="submit" class="btn btn-primary">
                Add Area
              </button>
            </form>
            <div class="text-center">
              <a class="small" href="login.html">See All Areas</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection