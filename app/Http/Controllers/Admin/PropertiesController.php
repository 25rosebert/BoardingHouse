<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Properties;
use App\Models\Images;
use App\Models\Category;
use App\Models\classification;
use App\Models\User;
use App\Models\locations;
use\Illuminate\Support\Facades\File;
class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Properties::where('category_id','1')->get();
        $properties_board =  Properties::where('category_id','2')->get();
        $properties_lot =  Properties::where('category_id','3')->get();
        $category = Category::all();
        $classification = Classification::all();
        $user = User::all();
        return view('admin.properties.index',compact('properties','user','classification','category','properties_board','properties_lot'));
    }
}

