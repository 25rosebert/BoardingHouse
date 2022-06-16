<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\properties;
class PageController extends Controller
{
    public function homePage(){
        $properties = properties::all();
        $properties_house = properties::where('id',1)->get();
        return view('welcome',compact('properties','properties_house'));
    }
}
