<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\boardinghouse;
use App\Models\Classification;
use App\Models\Category;
use App\Models\locations;
use App\Models\images;
class ViewController extends Controller
{
    public function homepage(){
        $properties_sale = Properties::where('classification_id','1')->take(10)->get();
        $properties_house = Properties::where('category_id','1')->take(10)->get();
        $hot_properties = Properties::where('category_id','1')->take(10)->get();
        $properties = Properties::all();
        $allProperties = properties::all();
       
        return view('welcome',compact('properties_sale','properties_house','properties','allProperties','hot_properties'));
    }
    public function about(){
        return view('pages.aboutUs');
    }
    public function contact(){
        return view('pages.contactUs');
    }
    public function agent(){
        return view('pages.agents');
    }

    public function buysalerent(){
        $properties = properties::paginate(6);
        // dd($properties);
        return view('buy-sale-rent',compact('properties'));
    }

    public function propertyDetails(){
    //    if(properties::where('id',$id)->exists()){
    //        $property = properties::where('id',$id)->get();
    //         dd($property);
    //        return view('property-details',compact('property'));
    //    }
    

        return view('sample');
    }

    public function show($name){
        if(Properties::where('name',$name)->exists()){
            $properties = properties::where('name',$name)->get();
        }
        return view('property-details',compact('properties'));
    }

    public function sample($id){
        if(Properties::where('id',$id)->exists()){
            $properties = properties::where('id',$id)->get();
            // dd($property);
        }
        return view('sample',compact('properties'));
    }

    public function viewimg(){
        $images = images::all();
        return view('landingpage.viewDetails',compact('images'));
        
    }

}