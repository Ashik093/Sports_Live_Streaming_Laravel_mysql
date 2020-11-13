<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\Category;
use App\Model\Price;
use App\Model\Match;
use App\Model\Payment;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        $price = Price::all();

        $first = Category::first();
        $todayFirstCategoryMatch = Match::where('date',date('Y-m-d'))->where('category_id',$first->id)->get();
        $category_name = null;
        return view('home',compact('category','price','todayFirstCategoryMatch','first','category_name'));
    }

    public function profile()
    {
        $now = date('Y-m-d'); 
        $check = Payment::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
        $datediff = strtotime($check->end_date) - strtotime($now);

        $remaining_days =  round($datediff / (60 * 60 * 24));

        $payment_history = Payment::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();

        return view('profile',compact('remaining_days','payment_history'));
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password'=>'required|min:8'
        ]);

        $data = User::find(Auth::user()->id);
        $data->password = Hash::make($request->password);
        $data->save();
        
        return Redirect()->route('profile')->with('success','Password Updated');

    }
}
