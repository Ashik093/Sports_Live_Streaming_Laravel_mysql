<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Price;
use App\Model\Match;

class FrontController extends Controller
{
    public function index()
    {
    	$category = Category::all();
    	$price = Price::all();

    	$first = Category::first();
    	$todayFirstCategoryMatch = Match::where('date',date('Y-m-d'))->where('category_id',$first->id)->get();
    	$category_name = null;
    	return view('index',compact('category','price','todayFirstCategoryMatch','first','category_name'));
    }

    public function todayAllMatch($id)
    {
    	$category = Category::all();
    	$price = Price::all();
    	$todayAllMatch = Match::where('date',date('Y-m-d'))->where('category_id',$id)->get();
    	$category_name = Category::find($id);
    	$first = null;
    	return view('index',compact('category','price','todayAllMatch','category_name','first'));
    }
}
