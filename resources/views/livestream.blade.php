@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				@if($user->payment == "yes")
					<div class="card">
					  <div class="card-body">
					    <h5 class="card-title text-center">{{ $data->team_one }} vs {{ $data->team_two }}</h5>
					    <p class="card-text">{{ $data->description }}</p>
					   	
					     	<iframe  src="{{ $data->channel_link }}" height="480" width="100%" frameborder="0" scrolling="no" allowfullscreen="" overflow:hidden;=""></iframe>

					  </div>
				@else

					<div class="card">
					  <div class="card-body">
					    <h5 class="card-title text-center">Payment</h5>
					    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
					    <form accept-charset="UTF-8" action="{{ route('stripe.payment') }}" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51H7PabLkD6KnO4bqLKO0O3Lc6lfrNPCZ6Ual5Jn8eMFiYExfVkoP3cvOyqaNadjVWCOcYXSm5wBrsto9S5uZ6yxW00C0IpAsdO" id="payment-form" method="post">
					    	@csrf
					      <div class='form-row mt-4'>
					        <div class='col-xs-12 col-md-12 form-group required'>
					          <label class='control-label'>Name on Card</label>
					          <input class='form-control' size='4' type='text' name="name">
					        </div>
					      </div>
					      <div class='form-row mt-4'>
					        <div class='col-xs-12 col-md-12 form-group required'>
					          <label class='control-label'>Card Number</label>
					          <input autocomplete='off' class='form-control card-number' size='20' type='text' name="cardnumber">
					        </div>
					      </div>
					      <div class='row mt-4'>
					        <div class='col-xs-4 col-md-4 form-group cvc required'>
					          <label class='control-label'>CVC</label>
					          <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc">
					        </div>
					        <div class='col-xs-4 col-md-4 form-group expiration required'>
					          <label class='control-label'>Expiration</label>
					          <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
					        </div>
					        <div class='col-xs-4 col-md-4 form-group expiration required'>
					          <label class='control-label'> </label>
					          <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
					        </div>
					      </div>
					      <div class='form-row mt-4'>
					        <div class='col-md-12'>
					          	<div class="form-check form-check-inline">
					          		<input class="form-check-input" type="radio" name="duration" value="7" required="">
					          		<label class="form-check-label" >$4/Week</label>
					          	</div>
					          	<div class="form-check form-check-inline">
					          		<input class="form-check-input" type="radio" name="duration" value="30">
					          		<label class="form-check-label">$16/Month</label>
					          	</div>
					          	<div class="form-check form-check-inline">
					          		<input class="form-check-input" type="radio" name="duration" value="365">
					          		<label class="form-check-label" >$100/Year</label>
					          	</div>
					          		
					          	
					        </div>
					      </div>
					      <div class='form-row mt-4'>
					        <div class='col-md-12 form-group'>
					          <button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
					        </div>
					      </div>
					      <div class='form-row mt-2'>
					        <div class='col-md-12 error form-group d-none'>
					          <div class='alert-danger alert'>
					            Please correct the errors and try again.
					          </div>
					        </div>
					      </div>
					    </form>
					    
					    @if(session()->has('fail-message'))
					        <div class="alert alert-danger">
					            {{ session()->get('fail-message') }}
					        </div>
					    @endif
					     	
					  </div>
					</div>
				@endif
				
				</div>


				
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
@endsection
	
