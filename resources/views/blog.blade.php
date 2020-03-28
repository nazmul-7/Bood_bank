@extends('layouts.master')
  
@section('content')



<div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-1">
          <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog</span></p>
          <h1 class="bread" style="margin-bottom: 5rem !important;">Our Blog</h1>
        </div>
      </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      @foreach($posts as $post)
      <div class="col-md-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="{{ route('singlePost',$post->id) }}" class="block-20" style="background-image: url('{{ asset($post->image) }}');">
          </a>
          <div class="text mt-3">
            <div class="meta mb-2">
              <div><a href="#">{{ $post->created_at }}</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
            <h3 class="heading"><a href="{{ route('singlePost',$post->id) }}">{{ $post->title }}</a></h3>
          </div>
        </div>
      </div>
      @endforeach
      
    {{--   <div class="col-md-3 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="{{ route('singlePost',4) }}" class="block-20" style="background-image: url('{{ asset('assets/images/image_4.jpg') }}');">
          </a>
          <div class="text mt-3">
            <div class="meta mb-2">
              <div><a href="#">March 1, 2020</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
          </div>
        </div>
      </div> --}}
    </div>
    <div class="row mt-5">
      <div class="col text-center d-flex bg_dark">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</section>



@endsection