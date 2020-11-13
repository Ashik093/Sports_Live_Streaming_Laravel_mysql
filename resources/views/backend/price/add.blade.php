@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Add New Match</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Add New Match</li>
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
			    <h3 class="card-title">Add New Match</h3>
			    
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('store.price') }}" method="post">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">

			  							<div class="form-group">
			  								<label>Title</label>
			  								<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" value="{{ old('title') }}">
			  							</div>
			  							@error('title')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Feature One</label>
			  								<input type="text" name="feature_one" id="feature_one" class="form-control @error('feature_one') is-invalid @enderror" placeholder="Enter Feature One" value="{{ old('feature_one') }}">
			  							</div>
			  							@error('feature_one')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Feature Two</label>
			  								<input type="text" name="feature_two" id="feature_two" class="form-control @error('feature_two') is-invalid @enderror" placeholder="Enter Feature two" value="{{ old('feature_two') }}">
			  							</div>
			  							@error('feature_two')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Feature Three</label>
			  								<input type="text" name="feature_three" id="feature_three" class="form-control @error('feature_three') is-invalid @enderror" placeholder="Enter Feature three" value="{{ old('feature_three') }}">
			  							</div>
			  							@error('feature_three')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			  						
			  							
			  							<button type="submit" class="btn btn-info">Add</button>
			  						</div>
			  						<div class="col-md-6">

			  							<div class="form-group">
			  								<label>Price</label>
			  								<input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter price" value="{{ old('price') }}">
			  							</div>
			  							@error('price')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Feature Four <small>(optional)</small></label>
			  								<input type="text" name="feature_four" id="feature_four" class="form-control @error('feature_four') is-invalid @enderror" placeholder="Enter Feature four" value="{{ old('feature_four') }}">
			  							</div>
			  							@error('feature_four')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Feature Five <small>(optional)</small></label>
			  								<input type="text" name="feature_five" id="feature_five" class="form-control @error('feature_five') is-invalid @enderror" placeholder="Enter Feature five" value="{{ old('feature_five') }}">
			  							</div>
			  							@error('feature_five')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Feature Six <small>(optional)</small></label>
			  								<input type="text" name="feature_six" id="feature_six" class="form-control @error('feature_six') is-invalid @enderror" placeholder="Enter Feature six" value="{{ old('feature_six') }}">
			  							</div>
			  							@error('feature_five')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			  						</div>
			  					
			  				</form>
			  			</div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()

