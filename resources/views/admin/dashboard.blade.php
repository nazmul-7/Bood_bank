@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">
  	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  	</div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Users</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\User::count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-primary"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today Join</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\User::where('created_at', '>=', \Carbon\Carbon::today())->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clock fa-2x text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Donors</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ App\User::where('availability',1)->count() }}</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-star fa-2x text-info"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Emergency Donors</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\User::where('emergency_contact',1)->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fa fa-star fa-2x text-danger"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-dark text-light">
              <h4>Blood Donors with Blood Group</h4>
            </div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    A+
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','A+')->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    A-
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','A-')->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    B+
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','B+')->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    B-
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','B-')->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    AB+
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','AB+')->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    AB-
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','AB-')->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    O+
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','O+')->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    O-
                    <span class="badge badge-success p-3">{{ App\User::where('blood_group','O-')->count() }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          
        </div>
      </div>

</div>


@endsection