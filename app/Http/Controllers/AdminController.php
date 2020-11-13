<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Model\Category;
use App\Model\Match;
use App\Model\Price;
use App\Model\Payment;
use App\User;
use App\Admin;




class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::count();
        $price = Price::count();
        $user = User::count();
        $totalEarning = Payment::sum('amount');
        $thisMonthEarning = Payment::where('month',date('m'))->sum('amount');
        $todayEarning = Payment::where('date',date('Y-m-d'))->sum('amount');

        $todayLive = Match::where('date',date('Y-m-d'))->where('status','Live')->count();
        $todayEnd = Match::where('date',date('Y-m-d'))->where('status','Ended')->count();
        $todayUpcoming = Match::where('date',date('Y-m-d'))->where('status','Upcoming')->count();

        $tomorrowMatch = Match::where('date',date('Y-m-d', strtotime(' +1 day')))->count();
        $yesterdayMatch = Match::where('date',date('Y-m-d', strtotime(' -1 day')))->count();

        return view('backend.dashboard',compact('category','price','user','todayLive','todayEnd','todayUpcoming','tomorrowMatch','yesterdayMatch','totalEarning','thisMonthEarning','todayEarning'));
    }

    public function changePassword()
    {
        return view('backend.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password'=>'required|min:8'
        ]);

        $data = Admin::find(Auth::user()->id);
        $data->password = Hash::make($request->password);
        if ($data->save()) {
            $notification = array(
                'messege'=>'Password Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('admin.dashboard')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('admin.dashboard')->with($notification);
        }
    }

    public function allUser()
    {
        $data = User::all();
        return view('backend.alluser',compact('data'));
    }

    public function allPayment()
    {
        $data = Payment::all();
        return view('backend.allpayment',compact('data'));
    }

     public function logout()
    {
         Auth::logout();
         return redirect()->to('/admin/login');
    }
}
