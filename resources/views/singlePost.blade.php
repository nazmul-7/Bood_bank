@extends('layouts.master')
@section('content')
<div class="hero-wrap hero-wrap-2">
  <div class="overlay"></div>
    <div class="container">
	    <div class="row no-gutters slider-text align-items-end justify-content-start">
		    <div class="col-md-12 ftco-animate text-center mb-5">
		      	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="#">Blog 
		        <h1 class="mb-3 bread">{{ $post->title }}</h1>
		    </div>
	    </div>
    </div>
</div>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">{{ $post->title }}</h2>
              <img src="{{ asset($post->image) }}"alt="" class="img-fluid">
              <p>{!! $post->body !!}</p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                  <a href="#" class="tag-cloud-link">Blood</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 pl-md-5 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">Recent Blog</h3>
              @foreach($recent as $post)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('{{ asset($post->image)  }}');"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">{{ $post->title }}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{ $post->created_at }}</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section> 
@endsection