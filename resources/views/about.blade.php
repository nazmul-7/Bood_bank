@extends('layouts.master')
  
@section('content')

  <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
  	<div class="overlay"></div>
  		<div class="container">
  		    <div class="row no-gutters slider-text align-items-end justify-content-start">
  		      <div class="col-md-12 ftco-animate text-center mb-5">
  		      	<p class="breadcrumbs mb-5"><span class="mr-3"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
  		    </div>
  		    </div>
  		</div>
  </div>


	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>About Blood Source Bangladesh.</h1>
	             	<p>
		                While about 38% of the population qualifies to give blood, according to <a href="https://www.redcross.org/">Red Cross</a> less than 10% are actually donating. Numbers are even lower in the rest of the world, with some countries relying mostly on blood from people that ask money for their gesture.
		                <br>
		                Because of the constant need for blood and the fact that supply can be at alarming low levels more often then not, blood collecting organizations are trying to reach as many possible donors they can.
		                <br>
		                In doing so, <a href="www.bloodsourcebd.com">Blood Source Bangladesh</a> is a charity foundation powered by <a href="https://dreamsgallerybd.com/">Dreams Gallery</a> to connect all blood donors in one platform to help people of Bangladesh.
	              	</p>
				</div>

				<div class="col-md-6">
					<img src="{{ asset('assets/images/clip-art.png') }}" style="height: auto; width: 90%;">
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
		    <form action="{{ route('contactmessage') }}" method="POST" class="p-5 bg-white">
		      @csrf
		      <h1>Write us</h1>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Your Name</label>
                  <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Enter Your Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Contact Email/Phone</label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="Email / Phone">
                </div>
              </div>

              <div class="row form-group mb-3">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Subject</label>
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Message</label>
                  <textarea name="message" class="form-control" name="message" id="" cols="30" rows="5"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Post" class="btn btn-primary  py-2 px-5">
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">#904, City Centre, 9th floor, Zindabazar, Sylhet</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4">(+88) 01611141115</p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0">
              	info@dreamgallerybd.com
              	<br>
				support@dreamgallerybd.com
			  </p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Dreams Gallery is one of the top online shopping places in Bangladesh for best quality products with best prices. It was 2nd June, 2015 when Dreams Gallery started its journey towards online business with a very few imported products. by time it grew big from small, and then bigger.</p>
              <p><a href="https://dreamsgallerybd.com/" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection