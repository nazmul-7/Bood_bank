@extends('layouts.master')
  
@section('content')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
	    <div class="row no-gutters slider-text align-items-end justify-content-start">
	      <div class="col-md-12 ftco-animate text-center mb-5">
	      	<p class="breadcrumbs mb-5"><span class="mr-3"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Faq</span></p>
	    </div>
	    </div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 pr-lg-4">
				<div class="row">
					@foreach($faqs as $faq)
					<div class="col-md-12 ftco-animate">
			            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
			              <div class="one-third mb-4 mb-md-0">
			                <div class="job-post-item-header align-items-center">
			                	<span class="subadge text-danger">Blood Donation</span>
			                  <h2 class="mr-3 text-black"> <a href="#"> {{ $faq->question }}</a> <i class="icon-question"></i></h2>
			                </div>
			                <div class="job-post-item-body faq-{{ $faq->id }}" style="display: none;">
			                  <div class="mr-3"><span class="icon-arrow-right"></span> {{ $faq->answer }} </div>
			                </div>
			              </div>
			              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
			                <button id="showFaq_{{ $faq->id }}" class="btn btn-primary py-2">See Answer</button>
			              </div>
			            </div>
			        </div>

			        <script>
					    $(document).ready(function(){
					      $("#showFaq_{{ $faq->id }}").click(function(){
					        $(".faq-{{ $faq->id }}").slideDown('slow').show();
					        $("#showFaq_{{ $faq->id }}").hide();
					      });						      
					    });
					</script>
					@endforeach
			        </div>
			        <div class="row mt-5">
			          <div class="col text-center d-flex bg_dark">
			            {{ $faqs->links() }}
			          </div>
			        </div>
			      </div>
			    </div>
			</div>
		</div>
	</section>


@endsection