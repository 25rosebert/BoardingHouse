<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Properties;
use App\Models\Category;
use App\Models\User;
use App\Models\Locations;
use App\Models\Houseandlot;
class SearchController extends Controller
{
    // public function search(Request $request){
    //     // Get the search value from the request
    //     $search = $request->input('search');
    
    //     // Search in the title and body columns from the posts table
    //     $properties = Properties::query()
    //         ->where('name', 'LIKE', '%' . $search .'%')
    //         ->orWhere('description', 'LIKE', '%' . $search . '%')
    //         ->orWhere('price', 'LIKE', '%' . $search . '%')
    //         ->paginate(10);
        
    //     $category= category::query()
    //         ->where('name', 'LIKE', '%' . $search .'%')
    //         ->orWhere('slug', 'LIKE', '%' . $search . '%')
    //         ->paginate(10);
        
    //     $locations = locations::query()
    //         ->where('address', 'LIKE', '%' . $search .'%')
    //         ->paginate(10);
    //     // Return the search view with the resluts compacted
    //     return view('landingpage.search', compact('properties','category','locations'));
    // }
    public function search(Request $request){
        if($request->has('search')){
            $property = properties::search($request->search)->paginate(8);
        }else{
            $property = properties::paginate(8);
        }
        return view('landingpage.search',['property' => $property]);
    }

    public function adminSearch(Request $request){
        // Get the search value from the request
        if($request->has('search')){
            $properties = properties::search($request->search)->get();
        }else{
            $properties = properties::get();
        }
        return view('admin.properties.searchresults', compact('properties'));
    }

    //Show Request properties by their ID
    public function viewHouse($id){
        $properties = Properties::where('id', $id)->get();
        return view('admin.properties.viewHouse',compact('properties'));
    }
    public function viewBoarding($id){
        $properties = Properties::where('id', $id)->get();
        return view('admin.properties.viewBoarding',compact('properties'));
    }
    public function viewLot($id){
        $properties = Properties::where('id', $id)->get();
        return view('admin.properties.viewLot',compact('properties'));
    }
}
