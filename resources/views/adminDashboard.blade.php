@extends('layouts.main')
@section('admindashboard')
     <!-- Begin Page Content -->
     <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1><br>
    <h3>Welcome back, Admin!</h3>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
    <a href="{{ route('enquireslist') }}" class="collapse-item {{ request()->is('enquireslist') ? 'active' : '' }}">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total leads Received</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{DB::table('enquires')->where('status', 1)->count()}}</h3></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
</a>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
