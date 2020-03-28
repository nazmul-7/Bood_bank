@extends('layouts.master')
  
@section('content')
  
  <div class="hero-wrap img">
    <div class="overlay"></div>
      <div class="container">
        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-10 d-flex align-items-center ftco-animate">
                <div class="text text-center pt-5">
                  <h1 class="mb-3">The Easiest & Fastest Way to Find Blood</h1>
                    <div class="ftco-counter ftco-no-pt ftco-no-pb">
                      <div class="row">
                        <div class="col-md-4 col-sm-4 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18">
                            <div class="text d-flex">
                              <div class="icon mr-2">
                                  <span class="flaticon-worldwide"></span>
                              </div>
                              <div class="desc text-left">
                                  <strong class="number" data-number="{{ App\District::count() }}">0</strong>
                                  <span>Districts</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                            <div class="text d-flex">
                              <div class="icon mr-2">
                                  <span class="flaticon-visitor"></span>
                              </div>
                              <div class="desc text-left">
                                  <strong class="number" data-number="{{ App\Area::count() }}">0</strong>
                                  <span>Area</span>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4 d-flex justify-content-center counter-wrap ftco-animate">
                          <div class="block-18 text-center">
                            <div class="text d-flex">
                              <div class="icon mr-2">
                                  <span class="flaticon-resume"></span>
                              </div>
                              <div class="desc text-left">
                                  <strong class="number" data-number="{{ App\User::count() }}">0</strong>
                                  <span>Active Donors</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ftco-search my-md-5">
                        <div class="row">
                          <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find A Donor</a>
                              @if(Auth::Check())
                              <a class="nav-link" href="{{ route('UserProfile') }}" aria-selected="true">Hello, {{ Auth::user()->name }}</a>
                              @else
                              <a class="nav-link" href="{{ route('register') }}" aria-selected="false">Be A Donor</a>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-12 tab-wrap">
                            <div class="tab-content p-4" id="v-pills-tabContent">
                              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                <form action="{{ route('searchResult') }}" class="search-job" method="POST">
                                  @CSRF
                                    <div class="row no-gutters">
                                        <div class="col-md-3 mr-md-3">
                                            <div class="form-group">
                                                <div class="form-field">
                                                    <div class="select-wrap">
                                                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                      <select name="blood_group" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" value="{{ old('blood_group') }}" required>
                                                          <option selected disabled>Select Blood Group</option>
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

                                        <div class="form-group col-md-3 mr-md-3">
                                          <div class="icon"><span class="icon-map-marker"></span></div>
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

                                        <div class="form-group col-md-3 mr-md-3">
                                            <span>
                                                <div class="icon"><span class="icon-map-marker"></span></div>
                                                <select name="area" id="area" class="area_name form-control @error('area') is-invalid @enderror" >
                                                      <option selected="selected" disabled>Select Area</option>
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
                                                  var district_id=$(this).val();
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
                    </div>
                    <div class="ftco-image">
                      <a href="https://dreamsgallerybd.com/" target="blank"><img src="{{ asset('assets/images/logo/DG.svg') }}"></a>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <section class="ftco-section" style="background-color: #F7F7F7;">
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


  @if(Auth::check())
      @if(Auth::user()->total_donated == '')
      
      <script>
          $(function() {
              setTimeout(function() {
                  $('#totalDonatedModal').modal('show');
              }, 1000);

          });
      </script>

      @endif
  

      <script>
          $(document).ready(function(){
            $("#showBtn").click(function(){
              $(".donatedForm").slideDown("slow").show();
              $(".hide").hide();
            });
            
          });
      </script>
      <div class="modal fade right modal-scrolling" id="totalDonatedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="heading">Welcome {{ Auth::user()->name }}</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row" align="center">
                            <div class="col-12 pl-pr-5">
                                <img src="{{ asset('assets/images/t_donated.png') }}" style="height: 70px; width: 200px;">
                                <h3 class=" mb-2">Did you ever donated blood before ?</h3>

                                <div class="hide">
                                  <button class="btn btn-lg btn-primary" id="showBtn">Yes, Donated <i class="fa fa-check fa-1x mb-1 animated rotateIn"></i></button>

                                  
                                  <button class="btn btn-lg btn-danger" onclick="document.getElementById('donated_no').submit();"  data-dismiss="modal">No <i class="fa fa-times fa-1x mb-1 animated rotateIn"></i></button>
                                  <form method="POST" id="donated_no" action="{{ route('no_donated',Auth::user()->id) }}">@csrf</form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="donatedForm col-12" id="donatedForm" style="display: none;">
                            <form action="{{ route('totalDonated',Auth::user()->id) }}" method="POST" class="pl-3 pr-3">
                              @csrf
                              <div class="form-field">
                                  <label for="total_time" class="text-muted text-left">Please specify how many times ?</label>
                                  <input type="text" id="total_time" name="total_donated" class="form-control ml-0" placeholder="Enter number." value="0">
                              </div>
                              <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                <button class="btn btn-lg btn-danger" data-dismiss="modal">I don't want to tell</button>
                              </div>
                            </form>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      
                    </div>
                </div>
            </div>
        </div>
@endif

      
@endsection