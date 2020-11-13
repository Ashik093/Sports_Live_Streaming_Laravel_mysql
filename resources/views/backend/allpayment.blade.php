@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">All Payment</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">All Payment</li>
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
			<div class="card">
			  <div class="card-header bg-info">
			    <h3 class="card-title">All Payment</h3>
			    
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Name</th>
			        <th>Card Number</th>
			        <th>CVC</th>
			        <th>Amount</th>
			        <th>Strat Date</th>
			        <th>End Date</th>
			        <th>Duration (Days)</th>
			       
			        
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($data as $row)
			      	
				    <tr>
				        
				        <td>{{ $row->user->name }}</td>
				        <td>{{ $row->cardnumber }}</td>
				        <td>{{ $row->cvc }}</td>
				        <td>{{ $row->amount }}</td>
				        <td>{{ $row->start_date }}</td>
				        <td>{{ $row->end_date }}</td>
				        <td>{{ $row->duration }}</td>
				        
				    </tr>
			      @endforeach()
			      </tbody>
			      <tfoot>
			      <tr>
					<th>Name</th>
			        <th>Card Number</th>
			        <th>CVC</th>
			        <th>Amount</th>
			        <th>Strat Date</th>
			        <th>End Date</th>
			        <th>Duration (Days)</th>
			       
			      </tr>
			      </tfoot>
			    </table>
			  </div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()