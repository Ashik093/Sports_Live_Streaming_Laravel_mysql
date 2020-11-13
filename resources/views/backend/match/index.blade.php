@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">All Match</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">All Match</li>
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
			    <h3 class="card-title">All Match</h3>
			    <a href="{{ route('add.match') }}" class="btn btn-sm btn-danger" style="float: right;">Add New Match</a>
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Category</th>
			        <th>Team One</th>
			        <th>Team Two</th>
			        <th>Time</th>
			        <th>Channel</th>
			        <th>Status</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($data as $row)
				    <tr>
				        
				        <td>{{ $row->category->name }}</td>
				        <td>{{ $row->team_one }}</td>
				        <td>{{ $row->team_two }}</td>
				        <td>{{ $row->time }}</td>
				        <td>{{ $row->channel_name }}</td>
				        <td>
				        	@if($row->date == date('Y-m-d'))
				        		<span @if($row->status == 'Upcoming') class="badge badge-success" @endif><a href="{{ route('change.match.status',['status'=>'Upcoming','id'=>$row->id]) }}" @if($row->status == 'Upcoming') class="text-white" @endif>Upcoming</a></span>
				        		<span @if($row->status == 'Live') class="badge badge-success" @endif><a href="{{ route('change.match.status',['status'=>'Live','id'=>$row->id]) }}" @if($row->status == 'Live') class="text-white" @endif>Live</a></span>
				        		<span @if($row->status == 'Ended') class="badge badge-success" @endif><a href="{{ route('change.match.status',['status'=>'Ended','id'=>$row->id]) }}" @if($row->status == 'Ended') class="text-white"  @endif>Ended</a></span>
				        	@else
				        		<span class="badge badge-success">{{ $row->status }}</span>
				        	@endif

				        </td>
				        <td><div class="btn-group"><a href="{{ route('edit.match',$row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('match.delete',$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
				    </tr>
			      @endforeach()
			      </tbody>
			      <tfoot>
			      <tr>
					<th>Category</th>
			        <th>Team One</th>
			        <th>Team Two</th>
			        <th>Time</th>
			        <th>Channel</th>
			        <th>Status</th>
			        <th>Action</th>
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