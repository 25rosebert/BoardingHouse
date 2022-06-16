<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\boardinghouse;
use App\Models\category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;  

class LandingpageController extends Controller
{
    public function landingpage(){
        $property = properties::orderBy('created_at','DESC')->paginate(8);
        $houseandlot = properties::where('category_id', 1)->get();
        $category = category::all();
        $lot = properties::where('category_id', 3)->get();
        
        return view('landingpage.landingpage',compact('property','category','houseandlot','lot'));
        // return view('landingpage.landingpage',['properties'=>$properties, 'category'=>$category,'houseandlot'=>$houseandlot,'lot'=>$lot]);
    }

    public function viewDetails($id, $catID){
        // $id = category::where('id',)
        $properties = properties::where('id',$id)->get();
        $propCategory = properties::where('category_id',$catID)->orderBy('created_at')->paginate(8);
        // $propCategory = properties::where('category_id',$catID);
        // $category = $propCategory->except($id);
        // dd($category);
        // dd($propetyCategory);

        return view('landingpage.viewDetails',compact('properties','propCategory'));
    }   

    public function viewCategory($slug)
    {
        if(category::where('slug',$slug)->exists()){
            $category = category::where('slug',$slug)->first();
            $property = properties::where('category_id',$category->id)->paginate(4);
            return view('landingpage.viewCategory',compact('category','property'));
        }
        else{
            return redirect('/')->with('status','slug does bot exist');
        }
    }
    
    public function showMap()
    {   
        $properties = properties::all();
        return view('landingpage.maps',compact('properties'));
    }   

}
