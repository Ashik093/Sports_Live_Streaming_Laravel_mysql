<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$data= Category::all();
    	return view('backend.category.index',compact('data'));
    }

    public function create()
    {
    	return view('backend.category.add');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'name'=>'required|unique:categories'
    	]);

    	$data = new Category();
    	$data->name = $request->name;
    	if ($data->save()) {
    		$notification = array(
    			'messege'=>'Category Successfully Added',
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
    	$data = Category::find($id);
    	return view('backend.category.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    		'name'=>'required'
    	]);

    	$data = Category::find($id);
    	$data->name = $request->name;
    	if ($data->save()) {
    		$notification = array(
    			'messege'=>'Category Successfully Updated',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.category')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.category')->with($notification);
        }
    }

    public function delete($id)
    {
    	$data = Category::find($id);
    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Category Successfully Deleted',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.category')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.category')->with($notification);
        }
    }
}
