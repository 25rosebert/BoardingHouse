<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Properties;
// use App\Models\RequestProperty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
 * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $properties = Properties::where('user_id',$user->id)->orderBy('id','desc')->get();       
        // $reqProperties = RequestProperty::where('user_id',$user->id)->orderBy('id','desc')->get();
        return view('home',compact('properties','user'));  
    }
   
}
