<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Classification;
use App\Models\RequestLocation;
use App\Models\RequestProperty;
use App\Models\RequestImage;
use App\Models\RequestHouse;
use App\Models\RequestBoarding;
use App\Models\RequestLot;
use App\Models\Status;
use App\Models\barangay;
use App\Http\Requests\BoardingValidationRequest;
use App\Http\Requests\HouseValidationRequest;
use App\Http\Requests\LotValidationRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\requestMail;

class RequestPropertiesController extends Controller
{
    // Boarding House Request
    public function addBoarding(){
        $category = category::where('id','2')->get();
        $classification = classification::all();
        $barangays = barangay::all();
        $statuses = status::where('id','4')->get();
        return view('user.boarding.add',compact('category','classification','barangays','statuses'));
    }
#################################################################################################
#################################################################################################

    public function storeBoarding(BoardingValidationRequest $request)
    {

        $validated = $request->validated();
        // dd($validated);
        if($request->hasFile('permit')){
            $file = $request->file('permit');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/permits/',$name);
        }
        else{
            return back()->with('status','Please fill up all fields');
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $photoName = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/images/',$photoName);
        }
        else{
            return back()->with('status','Please fill up all fields');
        }

        $properties = new RequestProperty();
        $properties->business_permit = $name;
        $properties->image = $photoName;
        $properties->barangay_id = $request->barangay_id;
        $properties->user_id = $request->user_id;
        $properties->phone = $request->contact_number;
        $properties->name = $request->name;
        $properties->status = $request->status;
        $properties->category_id = $request->category_id;
        $properties->classification_id = $request->classification_id;
        $properties->description = $request->description;
        $properties->price = $request->price;
        $properties->save();

        $location = new RequestLocation([
            'property_id' => $properties->id,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        $location->save();

        $boardinghouse = new RequestBoarding([
            'property_id' => $properties->id,
            'bed' => $request->bed, 
            'rooms' => $request->room,
            'livingroom' => $request->livingroom,
            'comfortroom' => $request->comfortroom,
            'kitchen' => $request->kitchen,
            'floor_total' => $request->floor_total,
            'floor_area' => $request->floor_area
        ]);
        $boardinghouse->save();

        if($request->hasFile('file')){
            $files = $request->file('file');
                $photoName = time().'_'.$files->getClientOriginalName();
                $files->move('assets/upload/properties/',$photoName);
                $images = new RequestImage([
                    'property_id'=>$properties->id,
                    'images'=>$photoName,
                ]); $images->save();                     
        }
        else{
            return back()->with('status','Please Fill up the form');
        }    
        $data = ([
            'name' => $properties->user->name,
            'property_name'=>$properties->name,
            'price' => $properties->price,
            'description' => $properties->description,
        ]);
        // return redirect()->back()->with('status','Property is Added Successfully!');
        Mail::to($properties->user->email)->send(new requestMail($data));

        return redirect()->back()->with('status','Your Property is submitted successfully please wait for confirmation');
    }
#################################################################################################
#################################################################################################
#################################################################################################
   
//House and Lot
    public function addHouse(){
        $category = category::where('id','1')->get();
        $classification = classification::all();
        $barangays = barangay::all();      
        $statuses = status::where('id','4')->get();    
        // dd($statuses);
        return view('user.houseandlot.add',compact('category','classification','barangays','statuses'));
    }

#################################################################################################
#################################################################################################

    public function storeHouse(HouseValidationRequest $request){
        $validate = $request->validated();
        //  dd($validate);

        if($request->hasfile('permit')){
            $file = $request->file('permit');
             $imageName = $file->getClientOriginalName();
             $newName = time().'.'.$imageName;
             $file->move('assets/upload/permits/', $newName);
         }
         else{
             $newName = null;
         }
        
         if($request->hasFile('photo')){
             $file = $request->file('photo');
             $name = $file->getClientOriginalName();
             $photoName = time().'_'.$name;
             $file->move('assets/upload/images/',$photoName);
         }    
         else{
             return back()->with('status','Please fill up all fields');
         }
         $properties = new RequestProperty();
         $properties->image = $photoName;
         $properties->business_permit = $newName;
         $properties->user_id = $request->user_id;
         $properties->phone = $request->contact_number;
         $properties->name = $request->name;
         $properties->status = $request->status;
         $properties->barangay_id = $request->barangay_id;
         $properties->category_id = $request->category_id;
         $properties->classification_id = $request->classification_id;
         $properties->description = $request->description;
         $properties->price = $request->price;
         $properties->save();

         $location = new RequestLocation([ 
            'property_id' => $properties->id,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        $location->save();

        $houseandlot = new RequestHouse([
            'property_id' => $properties->id,
            'bedroom' => $request->bedroom,
            'comfortroom' =>$request->comfortroom,
            'kitchen'=>$request->kitchen,
            'livingroom'=>$request->livingroom,
            'floor_area'=>$request->floor_area,
            'floor_total'=>$request->floor_total,
            'parking_lot'=>$request->parkinglot,
            'land_size' => $request->land_size
        ]); 
        $houseandlot->save();

        if($request->hasFile('file')){
            $files = $request->file('file');
                $photoName = time().'_'.$files->getClientOriginalName();
                $files->move('assets/upload/properties/',$photoName);
                $images = new RequestImage([
                    'property_id'=>$properties->id,
                    'images'=>$photoName,
                ]); $images->save();
        }
        else{
            return back()->with('status','Please Fill up the form');
        }    
        $data = ([
            'name' => $properties->user->name,
            'property_name'=>$properties->name,
            'price' => $properties->price,
            'description' => $properties->description,
        ]);
        // return redirect()->back()->with('status','Property is Added Successfully!');
        Mail::to($properties->user->email)->send(new requestMail($data));

        return redirect()->back()->with('status','Your Property is submitted successfully please wait for confirmation');
    }
#################################################################################################
#################################################################################################
#################################################################################################

public function addLot(){
    $category = category::where('id','3')->get();
    $classification = classification::all();
    $barangays = barangay::all();
    $statuses = status::where('id','4')->get();
    return view('user.lot.add',compact('category','classification','barangays','statuses'));
}

public function storeLot(LotValidationRequest $request){
    $validated = $request->validated();
    // dd($validated);

    if($request->hasFile('photo')){
        $file = $request->file('photo');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move('assets/upload/images/',$fileName);
    }
    $properties = new RequestProperty([
        'name'=>$request->name,
        'price'=>$request->price,
        'description'=>$request->description,
        // 'business_permit',
        'image'=>$fileName,
        'status'=>$request->status,
        'barangay_id'=>$request->barangay_id,
        'category_id'=>$request->category_id,
        'classification_id'=>$request->classification_id,
        'phone'=>$request->contact_number,
        'user_id'=>$request->user_id,
    ]); $properties->save();

    $locations = new RequestLocation([
        'property_id'=>$properties->id,
        'address'=>$request->address,
        'latitude'=>$request->latitude,
        'longitude'=>$request->longitude,        
    ]); $locations->save();

    $lot = new RequestLot([
        'property_id'=>$properties->id,
        'land_size'=>$request->land_size,
    ]); $lot->save();

    if($request->hasFile('file')){
        $files = $request->file('file');
            $photoName = time().'_'.$files->getClientOriginalName();
            $files->move('assets/upload/properties/',$photoName);
            $images = new RequestImage([
                'property_id'=>$properties->id,
                'images'=>$photoName,
            ]); $images->save();
    }
    $data = ([
        'name' => $properties->user->name,
        'property_name'=>$properties->name,
        'price' => $properties->price,
        'description' => $properties->description,
    ]);
    // return redirect()->back()->with('status','Property is Added Successfully!');
    Mail::to($properties->user->email)->send(new RequestMail($data));

    return redirect()->back()->with('status','Your Property is submitted successfully please wait for confirmation');
}
###############################################################################################################
###############################################################################################################
###############################################################################################################
}
