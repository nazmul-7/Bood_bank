<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blood Bank Bangladesh</title>
    <link rel="icon" href="{{ asset('assets/img/logo/favicon.png') }}" type="image/png" sizes="16x16"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  </head>
  <body>
    

@include('includes.navigation')
  
@yield('content')
    <div class="modal fade" id="userlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form method="POST" id="logout-form" action="{{ route('logout') }}">@csrf</form>
            <a href="#" class="btn btn-primary" onclick="document.getElementById('logout-form').submit();"><i class="fa fa-sign-in mr-1"></i> Logout</a>
          </div>
        </div>
      </div>
    </div>
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
            <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p> Blood Source Bangladesh is a charity foundation powered by Dreams Gallery to connect all blood donors in one platform to help people of Bangladesh.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/dreamsgallery" target="_blank"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="www.instagram.com/dreamsgallerybd" target="_blank"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Important Links</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('emergency') }}" class="pb-1 d-block">Emergency Contact</a></li>
                <li><a href="{{ route('about') }}" class="pb-1 d-block">About</a></li>
                <li><a href="{{ route('blog') }}" class="pb-1 d-block">Blog</a></li>
                <li><a href="{{ route('faq') }}" class="pb-1 d-block">FAQ</a></li>
              </ul>
            </div>
          </div>
         
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Account</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('login') }}" class="pb-1 d-block">Sign In</a></li>
                <li><a href="{{ route('register') }}" class="pb-1 d-block">Create Account</a></li>
                <li><a href="#" class="pb-1 d-block">.....</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Have a Questions?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li><span class="icon icon-map-marker"></span><span class="text">Location: #904, City Centre, 9th floor, Zindabazar, Sylhet.</span></li>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">(+88) 01611141115</span></a></li>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@dreamgallerybd.com</span></a></li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Copyright &copy;<?php echo Date("Y"); ?> Blood Source Bd. All rights reserved | <a href="https://desseinlab.com" target="_blank" class="text-primary">DesseinLab</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/aos.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
  @include('sweetalert::alert')

  <script type="text/javascript">

      $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

      $('.selectpicker').selectpicker('show');


      $(document).ready(function() {
        // Get saved data from sessionStorage
        let selectedCollapse = sessionStorage.getItem('selectedCollapse');
        if(selectedCollapse != null) {
          $('.accordion .collapse').removeClass('show');
          $(selectedCollapse).addClass('show');
        }
        //To set, which one will be opened
        $('.accordion .btn-link').on('click', function(){ 
          let target = $(this).data('target');
          //Save data to sessionStorage
          sessionStorage.setItem('selectedCollapse', target);
        });
      });

      $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
        $(e.target)
          .prev()
          .find("i:last-child")
          .toggleClass("fa-minus fa-plus");
      });
  </script>
  </body>
</html>