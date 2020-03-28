<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3 "><img src="{{ asset('resource/assets/img/LOGO_MAIN.svg') }}" style="height: 35px;"></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin Permissions
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ Route::currentRouteName() == 'emergencyDonors' ? 'active' : '' }}{{ Route::currentRouteName() == 'activeDonors' ? 'active' : '' }}{{ Route::currentRouteName() == 'onlineUsers' ? 'active' : '' }}{{ Route::currentRouteName() == 'allUsers' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Route::currentRouteName() == 'emergencyDonors' ? 'show' : '' }}{{ Route::currentRouteName() == 'activeDonors' ? 'show' : '' }}{{ Route::currentRouteName() == 'onlineUsers' ? 'show' : '' }}{{ Route::currentRouteName() == 'allUsers' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item {{ Route::currentRouteName() == 'emergencyDonors' ? 'active' : '' }}" href="{{ route('emergencyDonors') }}">Emergency Donors</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'activeDonors' ? 'active' : '' }}" href="{{ route('activeDonors') }}">Active Donors</a>{{-- 
            <a class="collapse-item {{ Route::currentRouteName() == 'onlineUsers' ? 'active' : '' }}" href="{{ route('onlineUsers') }}">Now Online Users</a> --}}
            <a class="collapse-item {{ Route::currentRouteName() == 'allUsers' ? 'active' : '' }}" href="{{ route('allUsers') }}" href="{{ route('allUsers') }}">All Users</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item {{ Route::currentRouteName() == 'addAddress' ? 'active' : '' }} {{ Route::currentRouteName() == 'allDistricts' ? 'active' : '' }} {{ Route::currentRouteName() == 'allAreas' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-map"></i>
          <span>Addresses</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ Route::currentRouteName() == 'allDistricts' ? 'show' : '' }} {{ Route::currentRouteName() == 'addAddress' ? 'show' : '' }}{{ Route::currentRouteName() == 'allAreas' ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::currentRouteName() == 'addAddress' ? 'active' : '' }}" href="{{ route('addAddress') }}">Add Address</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'allAreas' ? 'active' : '' }}" href="{{ route('allAreas') }}">Areas</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'allDistricts' ? 'active' : '' }}" href="{{ route('allDistricts') }}">Districts</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'addPost' ? 'active' : '' }} {{ Route::currentRouteName() == 'allPosts' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
          <i class="fas fa-fw fa-book"></i>
          <span>Blog</span>
        </a>
        <div id="collapseBlog" class="collapse {{ Route::currentRouteName() == 'addPost' ? 'show' : '' }} {{ Route::currentRouteName() == 'addPostStore' ? 'show' : '' }} {{ Route::currentRouteName() == 'allPosts' ? 'show' : '' }}{{ Route::currentRouteName() == 'categories' ? 'show' : '' }} {{ Route::currentRouteName() == 'editPost' ? 'show' : '' }}" aria-labelledby="headingBlog" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::currentRouteName() == 'addPost' ? 'active' : '' }}" href="{{ route('addPost') }}">Add Post</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'allPosts' ? 'active' : '' }}" href="{{ route('allPosts') }}">All Post</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'categories' ? 'active' : '' }}" href="{{ route('categories') }}">All Post Categories</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'faqs' ? 'active' : '' }} {{ Route::currentRouteName() == 'addFaqs' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaq" aria-expanded="true" aria-controls="collapseFaq">
          <i class="fas fa-fw fa-question"></i>
          <span>FAQ</span>
        </a>
        <div id="collapseFaq" class="collapse {{ Route::currentRouteName() == 'addFaqs' ? 'show' : '' }} {{ Route::currentRouteName() == 'faqs' ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::currentRouteName() == 'addFaqs' ? 'active' : '' }}" href="{{ route('addFaqs') }}">Add FAQ</a>
            <a class="collapse-item {{ Route::currentRouteName() == 'faqs' ? 'active' : '' }}" href="{{ route('faqs') }}">All FAQ</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{ Route::currentRouteName() == 'emergencyContact' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseemergency" aria-expanded="true" aria-controls="collapseemergency">
          <i class="fas fa-fw fa-ambulance"></i>
          <span>Emergency</span>
        </a>
        <div id="collapseemergency" class="collapse {{ Route::currentRouteName() == 'emergencyContact' ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::currentRouteName() == 'emergencyContact' ? 'active' : '' }}" href="{{ route('emergencyContact') }}">Emergency Contacts</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>