<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\category;
use App\Models\classificatiion;
use App\Models\RequestProperty;
use Illuminate\Http\Request;

class RequestPropertyController extends Controller
{  
    public function index()
    {
        //
    }

  
    public function create()
    {
        $category = category::all();
        $classification = classification::all();
        return view('requestProperties.create',compact('classification','category'));
    }

  
    public function store(Request $request)
    {
        //
    }

    public function show(RequestProperty $requestProperty)
    {
        //
    }

    public function edit(RequestProperty $requestProperty)
    {
        //
    }

    public function update(Request $request, RequestProperty $requestProperty)
    {
        //
    }

    public function destroy(RequestProperty $requestProperty)
    {
        //
    }
}
