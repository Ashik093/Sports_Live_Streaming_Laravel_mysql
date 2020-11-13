<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Match;
use App\Model\Payment;
use Auth;
use App\User;

class LiveController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function live($id)
    {
    	$today = date('Y-m-d');
    	$check = Payment::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();

    	$todayTime = strtotime($today);
    	$expireTime = strtotime($check->end_date);

    	if($todayTime > $expireTime){
    		$user = User::find(Auth::user()->id);
    		$user->payment ="no";
    		$user->save();

    		return view('livestream',compact('user'));
    	}
    	else{
    		$user = User::find(Auth::user()->id);
    		$data = Match::find($id);
    		return view('livestream',compact('data','user'));
    	}

    	
    }
}
