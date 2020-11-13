@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Dashboard</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="#">Home</a></li>
	          <li class="breadcrumb-item active">Dashboard </li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	    <!-- Small boxes (Stat box) -->
	    <div class="row">
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-info">
	          <div class="inner">
	            <h3>{{ $category }}</h3>

	            <p>Total Category</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-bag"></i>
	          </div>
	          
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-success">
	          <div class="inner">
	            <h3>{{ $price }}</h3>

	            <p>Total Price Plan</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-stats-bars"></i>
	          </div>
	          
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-warning">
	          <div class="inner">
	            <h3>{{ $user }}</h3>

	            <p>Total User</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-person-add"></i>
	          </div>
	          
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-danger">
	          <div class="inner">
	            <h3>${{ $totalEarning }}</h3>

	            <p>Total Earning</p>
	          </div>
	          <div class="icon">
	            <i class="ion ion-pie-graph"></i>
	          </div>
	          
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-danger">
	          <div class="inner">
	            <h3>{{ $todayLive }}</h3>

	            <p>Today Live Match</p>
	          </div>
	          
	          
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-warning">
	          <div class="inner">
	            <h3>{{ $todayUpcoming }}</h3>

	            <p>Today Upcoming Match</p>
	          </div>
	          
	          
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-success">
	          <div class="inner">
	            <h3>{{ $todayEnd }}</h3>

	            <p>Today Ended Match</p>
	          </div>
	          
	          
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-info">
	          <div class="inner">
	            <h3>{{ $todayEnd+$todayLive+$todayUpcoming }}</h3>

	            <p>Today Total Match</p>
	          </div>
	          
	          
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-info">
	          <div class="inner">
	            <h3>{{ $tomorrowMatch }}</h3>

	            <p>Tomorrow Total Match (Upcoming)</p>
	          </div>
	          
	          
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-success">
	          <div class="inner">
	            <h3>{{ $yesterdayMatch }}</h3>

	            <p>Yesterday Total Match (Ended)</p>
	          </div>
	          
	          
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-warning">
	          <div class="inner">
	            <h3>${{ $todayEarning }}</h3>

	            <p>Today Earning</p>
	          </div>
	          
	          
	        </div>
	      </div>
	      <div class="col-lg-3 col-6">
	        <!-- small box -->
	        <div class="small-box bg-danger">
	          <div class="inner">
	            <h3>${{ $thisMonthEarning }}</h3>

	            <p>This Month Earning</p>
	          </div>
	          
	          
	        </div>
	      </div>
	    </div>
	    <!-- /.row -->

	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()