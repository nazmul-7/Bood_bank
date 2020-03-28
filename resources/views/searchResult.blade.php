@extends('layouts.master')
  
@section('content')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
	    <div class="row no-gutters slider-text align-items-end justify-content-start">
	      <div class="col-md-12 ftco-animate text-center mb-5">
	      	<p class="breadcrumbs mb-5"><span class="mr-3"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Search</span></p>
	    </div>
	    </div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 pr-lg-4">
				@if($users->isEmpty())
					<div class="row" id="hideMessage">
						<h1 class="text-center">No Donor with this blood group is currently available in this area.</h1>
						<div class="col-md-12 ftco-animate mt-5">
				            <div class="job-post-item p-4 align-items-center">
				              <div class="one-third mb-4 mb-md-0">
				                <div class="job-post-item-header align-items-center">
								  <span>
								  	( {{ $blood_group }} ) in {{ $area->district->district_name }},{{ $area->area_name }}
								  </span>
				                  <h2 class="mr-3 text-red">We have some contact list, incase for emergencies.</h2>
				                  <p>They can help you find blood</p>
				                </div>
					            <div class="d-flex align-items-center mt-4 md-md-0">
					              	@if(Auth::check())
					              	<button id="showEmergency" class="btn btn-outline-danger">See Emergency Contacts</button>
					                @else
					                <a href="{{ route('login') }}" class="btn btn-outline-danger">Log in to See Emergency Contacts</a>
					                @endif
					            </div>
				              </div>
				              
				            </div>
				        </div>
					</div>
					
					<div class="row" id="showingcontact" style="display: none;">
						@if($emergencies->isEmpty())
							<div class="col-md-12 ftco-animate mt-5">
					            <div class="job-post-item p-4 align-items-center">
					              <div class="one-third mb-4 mb-md-0">
					                <div class="job-post-item-header align-items-center">
					                  <h2 class="mr-3" style="color: #EA251F;">No emergency contact is found in your selected area.</h2>
					                  <p>We apologies for this inconvinience.</p>
					                </div>
					              </div>
					            </div>
					        </div>
					    @else
						<div class="col-md-12 ftco-animate mt-5">
				            <div class="job-post-item p-4 align-items-center">
				              <div class="one-third mb-4 mb-md-0">
				                <div class="job-post-item-header align-items-center">
				                  <h2 class="mr-3" style="color: #EA251F;">Showing emergency contacts.</h2>
				                </div>
				              </div>
				            </div>
				        </div>
						@foreach($emergencies as $emergency)
						<div class="col-md-12 ftco-animate">
				            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
				              <div class="one-third mb-4 mb-md-0">
				                <div class="job-post-item-header align-items-center">
								  <span class="subadge">{{ $emergency->user->blood_group }}</span>
				                  <h2 class="mr-3 text-black"><a href="#">{{ $emergency->user->name }}</a></h2>
				                </div>
				                <div class="job-post-item-body d-block d-md-flex">
				                  <div class="mr-3"><span class="icon-clock-o"></span> Donated: <a href="#">{{ $emergency->user->total_donated }} Times</a></div>
				                  <div><span class="icon-event_available text-danger"></span> <span>Emergency only</span></div>
				                </div>
				                <div class="job-post-item-body d-block d-md-flex">
				                  <div class="mr-3"><span class="icon-layers"></span> <a href="#">{{ $emergency->area->district->district_name }}</a></div>
				                  <div><span class="icon-my_location"></span> <span>{{ $emergency->area->area_name }}, {{ $emergency->address }}</span></div>
				                </div>
				              </div>

				              <div class="one-forth d-flex align-items-center mt-4 md-md-0">
				              	@if(Auth::check())

				                <button id="showContact_{{ $emergency->id }}" class="btn btn-outline-danger">See Contact</button> 
				                <a id="contact-{{ $emergency->user->phone }}" href="tel:{{ $emergency->user->phone }}" class="btn btn-outline-primary contact-{{ $emergency->id }}" style="display: none;">+88 {{ $emergency->user->phone }}</a> 
				                
				                @else
				                <a href="{{ route('login') }}" class="btn btn-outline-danger">Log in to Contact</a>
				                @endif
				              </div>
				            </div>

				        </div><!-- end -->

				        <script>
						    $(document).ready(function(){
						      $("#showContact_{{ $emergency->id }}").click(function(){
						        $(".contact-{{ $emergency->id }}").show();
						        $("#showContact_{{ $emergency->id }}").hide();
						      });						      
						    });
						</script>

				        @endforeach
				        @endif
        			</div>

        			<script>
					    $(document).ready(function(){
					      $("#showEmergency").click(function(){
					        $("#showingcontact").show();
					        $("#hideMessage").hide();
					      });
					      
					    });
					</script>

				@endif

				<div class="row">
					@foreach($users as $user)
					<div class="col-md-12 ftco-animate">
			            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
			              <div class="one-third mb-4 mb-md-0">
			                <div class="job-post-item-header align-items-center">
							  <span class="subadge">{{ $user->user->blood_group }}</span>
			                  <h2 class="mr-3 text-black"><a href="#">{{ $user->user->name }}</a></h2>
			                </div>
			                <div class="job-post-item-body d-block d-md-flex">
			                  <div class="mr-3"><span class="icon-clock-o"></span> Donated: <a href="#">{{ $user->user->total_donated }} Times</a></div>
			                  <div><span class="icon-event_available text-success"></span> <span>Available</span></div>
			                </div>
			                <div class="job-post-item-body d-block d-md-flex">
			                  <div class="mr-3"><span class="icon-layers"></span> <a href="#">{{ $user->area->district->district_name }}</a></div>
			                  <div><span class="icon-my_location"></span> <span>{{ $user->area->area_name }}, {{ $user->address }}</span></div>
			                </div>
			              </div>

			              <div class="one-forth d-flex align-items-center mt-4 md-md-0">
			              	@if(Auth::check())

			                <button id="showContact_{{ $user->id }}" class="btn btn-outline-primary">See Contact</button> 
			                <a id="contact-{{ $user->user->phone }}" href="tel:{{ $user->user->phone }}" class="btn btn-outline-primary contact-{{ $user->id }}" style="display: none;">+88 {{ $user->user->phone }}</a> 
			                
			                @else
			                <a href="{{ route('login') }}" class="btn btn-outline-danger">Log in to Contact</a>
			                @endif
			              </div>
			            </div>
			        </div><!-- end -->
			        <script>
					    $(document).ready(function(){
					      $("#showContact_{{ $user->id }}").click(function(){
					        $(".contact-{{ $user->id }}").show();
					        $("#showContact_{{ $user->id }}").hide();
					      });
					    });
					</script>
			        @endforeach
        		</div>
		    </div>
	        <div class="col-lg-3 sidebar">
		        <div class="sidebar-box bg-white p-4 ftco-animate">
		        	<h3 class="heading-sidebar">Sort your search</h3>
		        	<hr>
		        	<form action="{{ route('searchResult') }}" class="search-job" method="POST">
                    @CSRF
						 
                        <div class="row no-gutters">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                          <select name="blood_group" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" value="{{ old('blood_group') }}" required>
                                              <option value="{{ $blood_group }}" selected>{{ $blood_group }}</option>
                                              <option value="A+">A+</option>
                                              <option value="A-">A-</option>
                                              <option value="B+">B+</option>
                                              <option value="B-">B-</option>
                                              <option value="AB+">AB+</option>
                                              <option value="AB-">AB-</option>
                                              <option value="O+">O+</option>
                                              <option value="O-">O-</option>
                                          </select>

                                          @error('blood_group')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12 mb-3">
                              <div class="icon"><span class="icon-map-marker"></span></div>
                                <select class="form-control district @error('district') is-invalid @enderror" name="district">
                                	 <option selected value="{{ $area->district->id }}">{{ $area->district->district_name }}</option>
                                      @foreach($districts as $district)
                                          <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                      @endforeach
                                </select>
                                  @error('district')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>

                            <div class="form-group col-md-12 mb-3">
                                <span>
                                    <div class="icon"><span class="icon-map-marker"></span></div>
                                    <select name="area" id="area" class="area_name form-control @error('area') is-invalid @enderror" >
                                          <option selected value="{{ $area->id }}">{{ $area->area_name }}</option>
                                      </select>
                                  </span>
                                  @error('area')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                            </div>


							<script type="text/javascript">
							      $(document).ready(function(){

							        $("#div2").hide();

							        $(document).on('change','.district',function(){
							          //console.log("hmm its change");

							          var district_id=$(this).val();

							          //console.log(district_id);
							          
							          var div=$(this).parent().parent().parent();

							          var op=" ";

							          $.ajax({
							            type:'get',
							            url:'{!!URL::to('/register/findArea')!!}',
							            data:{'id':district_id},
							            success:function(data){
							              
							              
							              op+='<option value="0" selected disabled>Choose Area</option>';
							              for(var i=0;i<data.length;i++){
							              op+='<option value="'+data[i].id+'">'+data[i].area_name+'</option>';
							               }

							               div.find('.area_name').html(" ");
							               div.find('.area_name').append(op);
							            },
							            error:function(){

							            }
							          });
							        });

							      });
							</script>
                            <div class="col-md">
                                <div class="form-group">
                                    <div class="form-field">
                                        <button type="submit" class="form-control btn btn-primary">Search</button>
                                      </div>
                                  </div>
                            </div>
                        </div>
                    </form>
		        </div>
	      	</div>
		</div>
	</div>
</section>

@endsection