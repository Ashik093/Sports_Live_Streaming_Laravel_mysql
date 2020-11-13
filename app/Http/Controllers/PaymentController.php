<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Model\Payment;
use Auth;
class PaymentController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function payment(Request $request)
    {
    	\Stripe\Stripe::setApiKey ('sk_test_51H7PabLkD6KnO4bq7quyhTp4bmgZAVJm0zEHcENd0XJbhFg2S9L0dXIxi5zRBeOt8dzAX2busjzyusbIhXAGBLER00G4svlbHo');
    	    try {
    	    	$amount= 0;
    	    	$end_date;
    	    	if ($request->input('duration') == '7') {
    	    		$amount = 4*100;
    	    		$end_date = date('Y-m-d', strtotime(' +7 day'));
    	    	}elseif($request->input('duration') == '30'){
    	    		$amount = 16*100;
    	    		$end_date = date('Y-m-d', strtotime(' +30 day'));
    	    	}elseif ($request->input('duration') == '365') {
    	    		$amount = 100*100;
    	    		$end_date = date('Y-m-d', strtotime(' +365 day'));
    	    	}

    	        \Stripe\Charge::create ( array (
    	                "amount" => $amount,
    	                "currency" => "USD",
    	                "source" => $request->input ('stripeToken' ),
    	                "description" => "NFL Sport Live Tv Stream Subscription fee."
    	        ) );

    	        $data = User::find(Auth::user()->id);
    	        $data->payment = "yes";
    	        $data->save();

    	        $paymentData = new Payment();
    	        $paymentData->user_id = Auth::user()->id;
    	        $paymentData->email = Auth::user()->email;
    	        $paymentData->name = $request->input('name');
    	        $paymentData->cardnumber = $request->input('cardnumber');
    	        $paymentData->cvc = $request->input('cvc');
    	        $paymentData->amount = $amount/100;
    	        $paymentData->start_date = date('Y-m-d');
    	        $paymentData->end_date = $end_date;
    	        $paymentData->duration = $request->input('duration');
    	        $paymentData->date = date('Y-m-d');
    	        $paymentData->month = date('m');
    	        $paymentData->Year = date('Y');
    	        $paymentData->save();


    	        return redirect()->back ();;
    	    } catch ( \Exception $e ) {
    	        
    	        return redirect()->back ()->with('fail-message','Error! Please Try again.');
    	    }

    }
}
