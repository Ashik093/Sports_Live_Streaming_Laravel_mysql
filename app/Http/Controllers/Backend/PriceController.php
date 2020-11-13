<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Price;

class PriceController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$data= Price::all();
    	return view('backend.price.index',compact('data'));
    }

    public function create()
    {
    	return view('backend.price.add');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'title'=>'required|unique:prices',
    		'price'=>'required',
    		'feature_one'=>'required',
    		'feature_two'=>'required',
    		'feature_three'=>'required',
    	]);

    	$data = new Price();
    	$data->title = $request->title;
    	$data->price = $request->price;
    	$data->feature_one = $request->feature_one;
    	$data->feature_two = $request->feature_two;
    	$data->feature_three = $request->feature_three;
    	$data->feature_four = $request->feature_four;
    	$data->feature_five = $request->feature_five;
    	$data->feature_six = $request->feature_six;
    	if ($data->save()) {
    		$notification = array(
    			'messege'=>'Price Plan Successfully Added',
    			'type'=>'success'
    		);

   			return Redirect()->back()->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {	
    	$data = Price::find($id);
    	return view('backend.price.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    		'title'=>'required',
    		'price'=>'required',
    		'feature_one'=>'required',
    		'feature_two'=>'required',
    		'feature_three'=>'required',
    	]);

    	$data = Price::find($id);
    	$data->title = $request->title;
    	$data->price = $request->price;
    	$data->feature_one = $request->feature_one;
    	$data->feature_two = $request->feature_two;
    	$data->feature_three = $request->feature_three;
    	$data->feature_four = $request->feature_four;
    	$data->feature_five = $request->feature_five;
    	$data->feature_six = $request->feature_six;
    	if ($data->save()) {
    		$notification = array(
    			'messege'=>'Price Successfully Updated',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.price')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.price')->with($notification);
        }
    }

    public function delete($id)
    {
    	$data = Price::find($id);
    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Price Successfully Deleted',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.price')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.price')->with($notification);
        }
    }
}
