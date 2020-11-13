<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Match;
use App\Model\Category;
use Image;

class MatchController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {

    }

    public function create()
    {
    	$categories = Category::all();
    	return view('backend.match.add',compact('categories'));
    }

    public function today()
    {
    	$data = Match::where('date',date('Y-m-d'))->get();
    	return view('backend.match.index',compact('data'));
    }

    public function tomorrow()
    {
    	$data = Match::where('date',date('Y-m-d', strtotime(' +1 day')))->get();
    	return view('backend.match.index',compact('data'));
    	
    }

    public function yesterday()
    {
    	$data = Match::where('date',date('Y-m-d', strtotime(' -1 day')))->get();
    	return view('backend.match.index',compact('data'));
    	
    }

    public function toBeDeletedMatch()
    {
        $data = Match::where('date','!=',date('Y-m-d', strtotime(' -1 day')))->where('date','!=',date('Y-m-d'))->where('date','!=',date('Y-m-d', strtotime(' +1 day')))->where('status','Ended')->get();
        return view('backend.match.index',compact('data'));
    }



    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'category_id'=>'required',
    		'team_one'=>'required',
    		'team_two'=>'required',
    		'team_one_image'=>'required',
    		'team_two_image'=>'required',
    		'time'=>'required',
    		'date'=>'required',
    		'channel_name'=>'required',
    		'channel_link'=>'required',
    		'status'=>'required'
    	]);


    	$data = new Match();

    	$data->category_id = $request->category_id;
    	$data->team_one = $request->team_one;
    	$data->team_two = $request->team_two;
    	$data->time = $request->time;
    	$data->date = $request->date;
    	$data->channel_name = $request->channel_name;
    	$data->channel_link = $request->channel_link;
    	$data->status = $request->status;
    	

    	$team_one_image = $request->team_one_image;
    
        $image_name_one = date('dm').uniqid().'1.'.$team_one_image->getClientOriginalExtension();
        Image::make($team_one_image)->resize(500,310)->save(public_path("/upload/teamOne/".$image_name_one));
        $data->team_one_image = "upload/teamOne/".$image_name_one;

        $team_two_image = $request->team_two_image;
    
        $image_name_two = date('dm').uniqid().'2.'.$team_two_image->getClientOriginalExtension();
        Image::make($team_two_image)->resize(500,310)->save(public_path("/upload/teamTwo/".$image_name_two));
        $data->team_two_image = "upload/teamTwo/".$image_name_two;
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Match Successfully Added',
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
    	$data = Match::find($id);
    	$categories = Category::all();
    	return view('backend.match.edit',compact('data','categories'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    		'category_id'=>'required',
    		'team_one'=>'required',
    		'team_two'=>'required',
    		'time'=>'required',
    		'date'=>'required',
    		'channel_name'=>'required',
    		'channel_link'=>'required',
    		'status'=>'required'
    	]);


    	$data = Match::find($id);

    	$data->category_id = $request->category_id;
    	$data->team_one = $request->team_one;
    	$data->team_two = $request->team_two;
    	$data->time = $request->time;
    	$data->date = $request->date;
    	$data->channel_name = $request->channel_name;
    	$data->channel_link = $request->channel_link;
    	$data->status = $request->status;
    	

    	$team_one_image = $request->team_one_image;
    
        if ($team_one_image) {
        	$image_name_one = date('dm').uniqid().'1.'.$team_one_image->getClientOriginalExtension();
        	Image::make($team_one_image)->resize(500,310)->save(public_path("/upload/teamOne/".$image_name_one));
        	unlink($data->team_one_image);
        	$data->team_one_image = "upload/teamOne/".$image_name_one;
        }

        $team_two_image = $request->team_two_image;
    
        if ($team_two_image) {
        	$image_name_two = date('dm').uniqid().'2.'.$team_two_image->getClientOriginalExtension();
        	Image::make($team_two_image)->resize(500,310)->save(public_path("/upload/teamTwo/".$image_name_two));
        	unlink($data->team_two_image);
        	$data->team_two_image = "upload/teamTwo/".$image_name_two;
        }
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Match Successfully Updated',
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

    public function delete($id)
    {
    	$data = Match::find($id);

    	unlink($data->team_one_image);
    	unlink($data->team_two_image);

    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Match Successfully Deleted',
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

    public function changeStatus($status,$id)
    {
    	$data = Match::find($id);
    	$data->status = $status;

    	if ($data->save()) {
    		$notification = array(
    			'messege'=>'Match Status Successfully Updated',
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
}
