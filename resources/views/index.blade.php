@extends('layouts.app')
@section('content')
<section>
		<div class="mid-nav">
			<div class="mid-nav-content">
				<a href="#">Yesterday</a>
				<a href="#" class="active">Today</a>
				<a href="#">Tomorrow</a>
			</div>
		</div>
	</section>
	<section>
		<div class="category-content-div">
			<div class="category">
				<div class="category-content">
					@foreach($category as $row)
						<a href="{{ route('today.all.match',$row->id) }}">{{ $row->name }}</a>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="schedule-div">
			<div class="schedule">
				<div class="schedule-content">
					<h5 class="mb-4">@if($first) {{ $first->name }} @endif @if($category_name) {{ $category_name->name }} @endif Schedule</h5>
					@if($first)
						@foreach($todayFirstCategoryMatch as $row)
							<div class="schedule-data">
								<div class="col-40">
									<p>{{ $row->team_one }}</p><img src="{{ URL::to($row->team_one_image) }}" alt="">
								</div>
								<div class="col-mid-10">
									<div class="time">
										<i class="fa fa-clock"></i>
										<p>{{ $row->time }}</p>
									</div>
								</div>
								<div class="col-30">
									<img src="{{ URL::to($row->team_two_image) }}" alt=""><p>{{ $row->team_two }}</p>
								</div>
								<div class="col-20">
									<a href="{{ route('live',$row->id) }}">Live Streams</a>
								</div>
							</div>
						@endforeach
					@endif

					@if($category_name)
						@foreach($todayAllMatch as $row)
							<div class="schedule-data">
								<div class="col-40">
									<p>{{ $row->team_one }}</p><img src="{{ URL::to($row->team_one_image) }}" alt="">
								</div>
								<div class="col-mid-10">
									<div class="time">
										<i class="fa fa-clock"></i>
										<p>{{ $row->time }}</p>
									</div>
								</div>
								<div class="col-30">
									<img src="{{ URL::to($row->team_two_image) }}" alt=""><p>{{ $row->team_two }}</p>
								</div>
								<div class="col-20">
									<a href="{{ route('live',$row->id) }}">Live Streams</a>
								</div>
							</div>
						@endforeach

					@endif
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="pacakge-section">
			<h4 class="mt-4 text-center mb-4">Our Pricing</h4>
			<div class="package">
				<div class="package-content">
					@foreach($price as $row)
						<div class="card">
						  <div class="card-header">
						    <h4>{{ $row->title }}</h4>
						  </div>
						 <div class="card-body">
						 	<h5 class="text-center">{{ $row->price }}</h5>
						 	<p><i class="fas fa-check-circle"></i> {{ $row->feature_one }}</p>
						 	<p><i class="fas fa-check-circle"></i> {{ $row->feature_two }}</p>
						 	<p><i class="fas fa-check-circle"></i> {{ $row->feature_three }}</p>
						 	<p><i class="fas fa-check-circle"></i> {{ $row->feature_four }}</p>
						 </div>
						</div>
					@endforeach
					
				</div>
			</div>
			
		</div>
	</section>
@endsection
	
