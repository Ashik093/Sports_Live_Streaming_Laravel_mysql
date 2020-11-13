@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Edit Match</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Edit Match</li>
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
			    <h3 class="card-title">Edit Match</h3>
			    
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('update.match',$data->id) }}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">

			  							<div class="form-group">
			  								<label>Team One Name</label>
			  								<input type="text" name="team_one" id="team_one" class="form-control @error('team_one') is-invalid @enderror" value="{{ $data->team_one }}">
			  							</div>
			  							@error('team_one')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			  						
			  							<div class="form-group">
			               	 			 	<img src="{{ URL::to($data->team_one_image) }}" alt="" id="team_one_image" style="width: 40px;height: 40px;">
			               	 			 	<label for="exampleInputFile">Team One Logo</label>
			               	 			 	<div class="input-group">
			               	 			 		<div class="custom-file">
			               	 			 			<input type="file"  accept="image/*" name="team_one_image"  class="custom-file-input" id="exampleInputFile" onchange="readURLOne(this);" >
			               	 			 			<label class="custom-file-label" for="exampleInputFile">Choose file</label>
			               	 			 		</div>
			               	 			 	</div>
			               	 			 </div>
			               	 			 @error('team_one_image')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 

			               	 			 <div class="form-group">
			  								<label>Match Time</label>
			  								<input type="text" name="time" id="time" class="form-control @error('time') is-invalid @enderror"  value="{{ $data->time }}">
			  							</div>
			  							@error('time')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Status</label>
			  								<select name="status" id="status" class="form-control select2bs4 @error('status') is-invalid @enderror">
			  									<option disabled="">Select A Status</option>
			  									<option @if($data->status == 'Live') selected="" @endif value="Live">Live</option>
			  									<option @if($data->status == 'Upcoming') selected="" @endif value="Upcoming">Upcoming</option>
			  									<option @if($data->status == 'Ended') selected="" @endif value="Ended">Ended</option>
			  									
			  								</select>
			  							</div>
			  							@error('status')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Channel Name</label>
			  								<input type="text" name="channel_name" id="channel_name" class="form-control @error('channel_name') is-invalid @enderror"  value="{{ $data->channel_name }}">
			  							</div>
			  							@error('channel_name')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Description </label>
			  								<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" >{{ $data->description }}</textarea>
			  							</div>
			  							@error('description')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 

			               	 			 
			  							<button type="submit" class="btn btn-info">Update</button>
			  						</div>
			  						<div class="col-md-6">

			  							<div class="form-group">
			  								<label>Team Two Name</label>
			  								<input type="text" name="team_two" id="team_two" class="form-control @error('team_two') is-invalid @enderror"  value="{{ $data->team_two }}">
			  							</div>
			  							@error('team_two')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			  						
			  							<div class="form-group">
			               	 			 	<img src="{{ URL::to($data->team_two_image) }}" alt="" id="team_two_image" style="width: 40px;;height: 40px;">
			               	 			 	<label for="exampleInputFile">Team Two Logo</label>
			               	 			 	<div class="input-group">
			               	 			 		<div class="custom-file">
			               	 			 			<input type="file"  accept="image/*" name="team_two_image"  class="custom-file-input" id="exampleInputFile" onchange="readURLTwo(this);" >
			               	 			 			<label class="custom-file-label" for="exampleInputFile">Choose file</label>
			               	 			 		</div>
			               	 			 	</div>
			               	 			 </div>
			               	 			 @error('team_two_image')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Match Date</label>
			  								<input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ $data->date }}">
			  							</div>
			  							@error('date')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror


			  							<div class="form-group">
			  								<label>Sports Category</label>
			  								<select name="category_id" id="category_id" class="form-control select2bs4 @error('category_id') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Sports Category</option>
			  									@foreach($categories as $row)
			  										<option @if($row->id==$data->category_id) selected="" @endif value="{{ $row->id }}">{{ $row->name }}</option>
			  									@endforeach
			  								</select>
			  							</div>
			  							@error('category_id')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
				               	 		

				               	 		<div class="form-group">
			  								<label>Channel Link</label>
			  								<textarea name="channel_link" id="channel_link" class="form-control @error('channel_link') is-invalid @enderror" >{{ $data->channel_link }}</textarea>
			  							</div>
			  							@error('channel_link')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 <div class="form-group">
			  								<label>Score</label>
			  								<input type="text" name="score" id="score" class="form-control @error('score') is-invalid @enderror" value="{{ $data->score }}">
			  							</div>
			  							@error('score')
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

