<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Classification;
class AllPropertiesController extends Controller
{
    public function chooseCategory(){
        $category = Category::all();
        return view('admin.properties.chooseCategory',compact('category'));
    }
    // public function addHouseLot(){
    //     $category = category::all();
    //     $classification = classification::all();
    //     return view('admin.houseAndLot.addHouse',compact('category','classification'));
    // }

    // public function addBoarding(){
    //     $category = category::all();
    //     $classification = classification::all();
    //     return view('admin.boardingHouse.addBoarding',compact('category','classification'));
    // }

    // public function addHouseLot(){
    //     $category = category::all();
    //     $classification = classification::all();
    //     return view('admin.houseAndLot.addHouse',compact('category','classification'));
    // }
}
