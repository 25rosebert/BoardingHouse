<?php

namespace App\Http\Controllers;
// use Illuminate\Facades\DB;
use Illuminate\Http\Request;
use App\Models\locations;
use App\Models\properties;

class MapController extends Controller
{
    public function map(){
        return view('pages.homepage');
    }    

    public function mapLocations(){
        $mapLocations = locations::all();
        $properties = properties::all();
        return view('admin.properties.maps',compact('mapLocations','properties'));
    }
}                                                       
