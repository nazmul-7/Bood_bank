@extends('layouts.master')
  
@section('content')
  
  <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
      <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
              <p class="breadcrumbs mb-5"><span class="mr-3"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Emergency Contact</span></p>
          </div>
          </div>
      </div>
  </div>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Bangladesh Emergency Contacts</h1>
           <ul class="list-group">
              @foreach($emergencies as $emergency)
              <li class="list-group-item d-flex @if($emergency->priority_status == 1) text-danger @endif justify-content-between align-items-center">
                {{ $emergency->contact_name }}
                @if($emergency->priority_status == 1)
                <span class="badge badge-danger badge-pill p-3" style="font-size: 15px;">{{ $emergency->contact_number }}</span>
                @else
                <span class="badge badge-dark badge-pill p-3" style="font-size: 15px;">{{ $emergency->contact_number }}</span>
                @endif

              </li>
              @endforeach
              
              
            </ul> 
        </div>
      </div>
    </div>
  </section>
  
@endsection