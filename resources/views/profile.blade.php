@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card mb-4">
		  <div class="card-body">
		    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
		    <h5 class="card-title text-center">{{ Auth::user()->email }}</h5>
		    <h5 class="card-title text-center"> Payment: {{ Auth::user()->payment }}</h5>
		    <h5 class="card-title text-center"> Reamining Subcription Days: {{ $remaining_days }} Days</h5>
		   </div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
  <div class="row ">
    <!-- Small boxes (Stat box) -->
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h4 class="text-center">Change Your Password</h4>
			<div class="card mb-4">
			  @if(session()->has('success'))
			      <div class="alert alert-success">
			          {{ session()->get('success') }}
			      </div>
			  @endif
			  <!-- /.card-header -->
			  			<div class="card-body">

			  				<form action="{{ route('update.user.password') }}" method="post">
			  					@csrf
			  					<div class="row">
			  						<div class="col-md-3"></div>
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group mb-2">
			  								<label>Enter New Password</label>
			  								<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password">
			  							</div>
			  							@error('password')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			  
			  							<button type="submit" class="btn btn-info">Change</button>
			  						</div>
			  						<div class="col-md-3"></div>
			  						
			  					
			  				</form>
			  			</div>
			  <!-- /.card-body -->
			</div>
		</div>
		<div class="col-md-2"></div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h3 class="text-center">Your Payment History</h3>
		<div class="card mb-4">
			@foreach($payment_history as $row)
				<div class="card-body">
				  <div class="row">
				  	<div class="col-md-4"><b>Card Number</b><br>{{ $row->cardnumber }}</div>
				  	<div class="col-md-2"><b>CVC</b><br>{{ $row->cvc }}</div>
				  	<div class="col-md-3"><b>Date</b><br>{{ $row->date }}</div>
				  	<div class="col-md-3"><b>Amount</b><br>${{ $row->amount }}</div>
				  </div>
				 </div>
			@endforeach
		  
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

@endsection