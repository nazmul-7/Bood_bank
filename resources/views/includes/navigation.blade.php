      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid px-md-4 ">
          <a class="navbar-brand" href="{{ route('index') }}">
              <img src="{{ asset('assets/images/logo/LOGO_MAIN.svg') }}" style="height: 45px;">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
              <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a href="{{ route('about') }}" class="nav-link">About</a></li>
              <li class="nav-item {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
              <li class="nav-item {{ Route::currentRouteName() == 'faq' ? 'active' : '' }}"><a href="{{ route('faq') }}" class="nav-link">FAQ</a></li>
              @if(Auth::Check())
              <li class="nav-item cta mr-md-1"><a href="{{ route('UserProfile') }}" class="nav-link"><i class="fa fa-user mr-1"></i> {{ Auth::user()->name }}</a></li>
              <li class="nav-item">
                  <a href="#" data-toggle="modal" data-target="#userlogoutModal" class="nav-link"><i class="fa fa-sign-in mr-1"></i> Logout</a>
              </li>
              @else
              <li class="nav-item cta mr-md-1"><a href="{{ route('login') }}" class="nav-link">Find Blood</a></li>
              <li class="nav-item cta cta-colored"><a href="{{ route('register') }}" class="nav-link">Be a Donor</a></li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->