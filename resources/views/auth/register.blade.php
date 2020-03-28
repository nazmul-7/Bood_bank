@extends('layouts.master')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset("assets/images/bg_1.jpg") }}');" data-stellar-background-ratio="0.9">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
              <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Be a Donor</span></p>
                <h1 class="mb-3 bread">Two Step to be a Donor</h1>
              </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        
        <div class="row block-9">
            <div class="col-md-12 mb-2">
                <h2 class="h3">{{ __('Your Personal Information') }}</h2>
                <p>Give Your information and let others know that you are availabe.</p>
            </div>
            <div class="col-md-6">
                <form action="{{ route('register') }}" class="bg-white p-5 contact-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Name') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter Your Name.">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="blood_group" class="col-form-label">{{ __('Blood Group') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
                        <select name="blood_group" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" value="{{ old('blood_group') }}" required>
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
                        <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" autocomplete="weight" placeholder="Enter Your Weight">

                        @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-form-label text-muted">{{ __('Mobile Number') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" placeholder="Enter Your Mobile Number">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-field" class="col-form-label">{{ __('Password') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
                        <input id="password-field" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="new-password" name="password" placeholder="Enter A Password">
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="col-md-6 bg-white p-5 contact-form" id="register-hide">
                <div class="form-group">
                    <div class="form-field">
                        <div class="select-wrap">
                            <label for="gender" class="col-form-label">{{ __('Gender') }}</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                              <option disabled>Select Your Gender</option>
                              <option value="1" selected>Male</option>
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
                    <label for="district" class="col-form-label">{{ __('District') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
                    <select class="form-control district @error('district') is-invalid @enderror" name="district">
                          <option selected disabled>Select Districts</option>
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

                
                <div class="form-group">
                    <label for="area" class="col-form-label">{{ __('Area') }}<span style="font-weight: bold; font-size: 15px; color: #EA251F;">*</span></label>
                    <span>
                        <select name="area" id="area" class="area_name form-control @error('area') is-invalid @enderror" >
                            <option selected="selected" disabled>Select Your Area</option>
                        </select>
                    </span>
                    @error('area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

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


            
                <div class="form-group">
                    <label for="password-field" class="col-form-label">{{ __('Address') }}</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Enter Your Address">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-field" class="col-form-label">{{ __('Email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input type="submit" value="{{ __('Submit') }}" class="btn btn-primary py-3 px-5">
                </div>
            </form>
            </div>
        </div>
    </div>
</section>

       {{-- <div class="row form-group">
                    <div class="col-6">
                        <div class="custom-control custom-radio-default custom-control-inline">
                            <input type="radio" id="male" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio-default custom-control-inline">
                            <input type="radio" id="female" name="gender" class="custom-control-input btn-primary">
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                    </div>
                </div> --}}


@endsection
