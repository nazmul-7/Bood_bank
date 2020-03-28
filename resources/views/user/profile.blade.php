@extends('layouts.master')

@section('content')
	
<div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset("assets/images/bg_1.jpg") }}');" data-stellar-background-ratio="0.9">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
              <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Account</span></p>
                <h5 class="text-muted mb-5">Welcome {{ Auth::user()->name }}</h5>
              </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
	<div class="container">
	  	<div class="row">
	  		<div class="col-md-12">
	            <h2 class="h3">{{ __('Your Personal Information') }}</h2>
	            <p>You can edit your personal information from here.</p>
	        </div>
	  		<div class="col-md-12">
	  			<div class="accordion" id="accordionExample">
					<div class="card">
					    <div class="card-header" id="headingOne">
					      <h2 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					          Personal Information
					        </button>
					      </h2>
					    </div>

					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					      <div class="card-body">
					        	<form action="{{ route('userpersonalinfoupdate',Auth::user()->id) }}" class="bg-white p-5 contact-form" method="POST">
		                            @csrf
		                            <div class="form-group">
		                                <label for="name" class="col-form-label">{{ __('Name') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
		                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" autocomplete="name" autofocus placeholder="Enter Your Name.">

		                                @error('name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>

		                            <div class="form-group">
		                                <label for="blood_group" class="col-form-label">{{ __('Blood Group') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
		                                <select name="blood_group" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" value="{{ old('blood_group') }}" required>
		                                    <option selected >{{ Auth::user()->blood_group }}</option>
		                                    <option selected disabled>Select Blood Group</option>
		                                    <option value="A+">A+</option>
		                                    <option value="A-">A-</option>
		                                    <option value="B+">B+</option>
		                                    <option value="B-" selected>B-</option>
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

		                            <div class="form-group">
		                                <label for="weight" class="col-form-label text-muted">{{ __('Weight') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
		                                <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ Auth::user()->weight }}" autocomplete="weight" placeholder="Enter Your Weight">

		                                @error('weight')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>

		                            <div class="form-group">
		                                <label for="phone" class="col-form-label text-muted">{{ __('Mobile Number') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
		                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" autocomplete="phone" placeholder="Enter Your Mobile Number">

		                                @error('phone')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>

			                        <div class="form-group">
			                            <div class="form-field">
			                                <div class="select-wrap">
			                                    <label for="gender" class="col-form-label">{{ __('Gender') }}</label>
			                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
			                                      <option disabled>Select Your Gender</option>
			                                      <option value="{{ Auth::user()->gender }}" selected>
			                                            @if(Auth::user()->gender == 1)
			                                            Male
			                                            @else
			                                            Female
			                                            @endif
			                                      </option>
			                                      <option value="1">Male</option>
			                                      <option value="2">Female</option>
			                                    </select>
			                                </div>
			                                @error('gender')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label for="password-field" class="col-form-label">{{ __('Email') }}</label>
			                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" placeholder="Enter Your Email">
			                            @error('email')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
			                        </div>

			                        <div class="form-group">
			                            <label for="password-field" class="col-form-label">{{ __('Facebook User Name') }}</label>
			                            <input type="text" class="form-control @error('facebook_url') is-invalid @enderror" name="facebook_url" value="{{ Auth::user()->facebook_url }}" placeholder="Enter Your Facebook User Name">
			                            @error('facebook_url')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
			                        </div>
			                        <div class="form-group">
			                            <input type="submit" value="{{ __('Update') }}" class="btn btn-primary py-3 px-5">
			                        </div>
		                    	</form>
					      </div>
					    </div>
					  </div>
					  <div class="card">
						    <div class="card-header" id="headingTwo">
						      	<h2 class="mb-0">
						        	<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Blood Donated Information
						        </button>
						      	</h2>
						    </div>
					    	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					     		<div class="card-body">
							        <div class="p-5 contact-form">
			                            <h5 class="text-left text-muted">Save your donation dates, and we will keep you updated. <span class="pull-right"><button type="button" class="btn btn-primary waves-effect waves-light py-3 px-5" data-toggle="modal" data-target="#modalLoginAvatarDemo">{{ __('Update Now') }}</button></span></h5>
			                        </div>
	                        		<table class="table mt-1">
			                            <thead>
			                                <tr>
			                                  <th scope="col">#</th>
			                                  <th scope="col">Previous donation date</th>
			                                  <th scope="col">Action</th>
			                                </tr>
			                            </thead>
	                            		<tbody>
	                            			@if($donations->isEmpty())
	                            				<tr>
	                            					<td class="text-center" colspan="3"><h4>You didn't add any date</h4></td>
	                            				</tr>
	                            			@else
	                            			<?php $sr = 1; ?>
	                            			@foreach($donations as $donation)
	                                		<tr>
	                                  			<td scope="row">{{ $sr }}</td>
	                                  			<td>{{ $donation->donation_date }}</td>
	                                  			<td>

                                  				<button type="button" data-toggle="modal" data-target="#deleteDonationDate-{{ $donation->id }}" class="btn btn-danger">
														Delete
												</button>

	                                  			</td>
	                                		</tr>
	                                		<?php $sr++; ?>
	                                		@endforeach
	                                		@endif
	                            		</tbody>
	                        		</table>
					      		</div>
					    	</div>
					  	</div>
					  	<div class="card">
						    <div class="card-header" id="headingThree">
						      <h2 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Search & Emergencies
						        </button>
						      </h2>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      	<div class="card-body">
							        <div class="jumbotron bg-white" align="center">
			                            <p class="headings text-center">Do you want to select yourself as an emergency contact ?</p>
			                            <form class="main-container" id="emergency-contact" action="{{ route('useremergencycontact',Auth::user()->id) }}" method="POST">@csrf

			                            	@if(Auth::user()->emergency_contact == 1)
												<div class="form-group">
													<label class="label-switch switch-success">
				                                <input type="checkbox" class="switch switch-bootstrap status" name="emergency_contact" id="status" value="0" onchange="document.getElementById('emergency-contact').submit();"  checked="checked">
				                                <span class="lable"></span></label>
				                                <span><strong>ON</strong></span>

												</div>

			                                @else
			                                	<span class="p-0"><strong>OFF</strong></span>
			                                	<label class="label-switch switch-primary">
				                                <input type="checkbox" class="switch switch-bootstrap status" name="emergency_contact" id="status" value="1" onchange="document.getElementById('emergency-contact').submit();">
				                                <span class="lable"></span></label>
			                                @endif
			                            </form>
			                        </div>
			                        <hr>
			                        <div class="jumbotron bg-white" align="center">
			                            <p class="headings">You can minimise your account in people search list.</p>
			                            <form class="main-container" id="availability-status" action="{{ route('userdisablesearch',Auth::user()->id) }}" method="POST">
			                            	@csrf

			                            	@if(Auth::user()->availability == 1)
												<div class="form-group">

													<label class="label-switch switch-success">
					                                <input type="checkbox" class="switch switch-bootstrap status" name="availability" id="status" value="0" onchange="document.getElementById('availability-status').submit();"  checked="checked">
					                                <span class="lable"></span></label>
					                                <span><strong>ON</strong></span>

												</div>
			                                @else
			                                	<span class="p-0"><strong>OFF</strong></span>
			                                	<label class="label-switch switch-primary">
				                                <input type="checkbox" class="switch switch-bootstrap status" name="availability" id="status" value="1" onchange="document.getElementById('availability-status').submit();">
				                                <span class="lable"></span></label>
			                                @endif
			                            </form>
			                        </div>
						      	</div>
						    </div>
						</div>
						<div class="card">
						    <div class="card-header" id="headingFour">
						      <h2 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						          Password & Access Credentials
						        </button>
						      </h2>
						    </div>
						    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
						      	<div class="card-body">
						      		@if(session('error'))
			                            <div class="alert alert-danger">
			                            		{{ session('error') }}
			                            </div>
			                            @endif
							        	 @if($errors->any())
			                            	<div class="alert alert-danger pt-3">
			                            		<ul>
			                            			@foreach($errors->all() as $error)
			                            				<li>{{ $error }}</li>
			                            			@endforeach
			                            		</ul>
			                            	</div>
			                            @endif
							        <form action="{{ route('userChangePassword',Auth::user()->id) }}" method="POST">
							        	@csrf

							        	<div class="row">
							        		<div class="col-md-4">
							        			<div class="form-group">
							                        <label for="password-field" class="col-form-label">{{ __('Old Password') }}</label>
							                        <input id="password-field" type="password" class="form-control @error('password') is-invalid @enderror"  autocomplete="new-password" name="password" placeholder="Enter Your Old Password">
							                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

							                        @error('password')
							                            <span class="invalid-feedback" role="alert">
							                                <strong>{{ $message }}</strong>
							                            </span>
							                        @enderror
							                    </div>
							        		</div>
							        		
							        		<div class="col-md-4">
							        			<div class="form-group">
							                        <label for="password-field" class="col-form-label">{{ __('New Password') }}</label>
							                        <input id="password-field" type="password" class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}" autocomplete="new-password" name="new_password" placeholder="Enter New Password">
							                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

							                        @error('new_password')
							                            <span class="invalid-feedback" role="alert">
							                                <strong>{{ $message }}</strong>
							                            </span>
							                        @enderror
							                    </div>
							        		</div>
							        		<div class="col-md-4">
							        			<div class="form-group mt-1 pt-3">
						                            <input type="submit" value="{{ __('Save') }}" class="form-control btn btn-primary mt-2">
						                        </div>
							        		</div>
							        	</div>
							        </form>
						      	</div>
						    </div>
						</div>
					</div>
	  			</div>
	  		</div>
		</div>

		<div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-avatar" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-center text-muted">Please submit your donation date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">×</span>
                        </button>
                    </div>
                    <div class="modal-body mb-1">
                        <form action="{{ route('userdonationdate') }}" method="POST">
                        	@CSRF
                        	<div class="md-form ml-0 mr-0">
	                        	<label for="date text-left">Donation Date</label>
	                            <input type="text" name="date" value="<?php echo date('d-m-Y') ?>" id="date" class="form-control">
	                        </div>

	                        <div class="text-center">
	                            <button type="submit" class="btn btn-primary mt-2 py-3 px-5 waves-effect waves-light">Submit </button>
	                            <button class="btn btn-danger mt-2 py-3 px-5 waves-effect waves-light" class="close" data-dismiss="modal" aria-label="Close">Cancel </button>
	                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        @foreach($donations as $donation)
			<div class="modal fade" id="deleteDonationDate-{{ $donation->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteDonationDateTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">You are about to delete your donation date <br> {{ $donation->donation_date }}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body text-center">
							<h1>ARE YOU SURE ?</h1>
						</div>
						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-primary px-3 py-1" data-dismiss="modal">No, Keep it</button>
							<form id="deleteuser-{{ $donation->id }}" action="{{ Route('userdeleteDonationDate', $donation->id) }}" method="GET">@csrf
								<button type="submit" class="btn btn-danger px-3 py-1">DELETE</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		@endforeach
</section>
@endsection
