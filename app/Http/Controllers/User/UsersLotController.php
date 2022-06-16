<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\LotValidationRequest;
use App\Http\Requests\UpdateLotRequest;
use App\Models\Category;
use App\Models\Barangay;
use App\Models\status;
use App\Models\Classification;
use App\Models\properties;
use App\Models\locations;
use App\Models\lot;
use App\Models\images;
use Illuminate\Support\Facades\File;

class UsersLotController extends Controller
{
    public function add(){
        $category = category::where('id','3')->get();
        $classification = classification::all();
        $barangays = barangay::all();
        $statuses = status::where('id','4')->get();
        return view('user.lot.add',compact('category','classification','statuses','barangays'));
    }

    public function storeLot(LotValidationRequest $request){
        $validated = $request->validated();
        // dd($validated);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/images/',$fileName);
        }
        $properties = new properties([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            // 'business_permit',
            'barangay_id'=>$request->barangay_id,
            'status'=>$request->status,
            'image'=>$fileName,
            'category_id'=>$request->category_id,
            'classification_id'=>$request->classification_id,
            'phone'=>$request->contact_number,
            'user_id'=>$request->user_id,
        ]); $properties->save();

        $locations = new locations([
            'property_id'=>$properties->id,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'landmarks' => $request->landmark
        ]); $locations->save();

        $lot = new lot([
            'property_id'=>$properties->id,
            'land_size'=>$request->land_size,
        ]); $lot->save();

        if($request->hasFile('file')){
            $files = $request->file('file');
            foreach($files as $file){
                // if($file <= 5){
                    $newName = time().'_'.$file->getClientOriginalName();
                    $request['property_id'] = $properties->id;
             $request['images'] = $newName;
                    $file->move('assets/upload/properties/',$newName);
                    Images::create($request->all());    
                // }
            }
        } 
        else{
            return back()->with('status','Please Fill up the form');
        }      
        return redirect('/home')->with('status','Lot Has Been Added and Posted Successfully');
    }
    public function edit($id){
        $properties = properties::find($id);
        $category = category::where('id','3')->get();
        $classification = classification::all();
        $statuses = status::all();

        return view('user.lot.edit',compact('properties','category','classification','statuses'));
    }
    public function update(UpdateLotRequest $request, $id){
        $validated = $request->validated();
        // dd($validated);   //test again if the input request are valid 
        $properties = properties::find($id);            
        if($request->hasFile('photo')){
            if(File::exists('assets/upload/images/'.$properties->image))
            {
                File::delete('assets/upload/images/'.$properties->image);
            }
            $file = $request->file('photo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/images/',$fileName);
            $properties->image = $fileName;
        }
      
            //Updating the property table 
            $properties->user_id = $request->user_id;
            $properties->status = $request->status;
            $properties->phone = $request->contact_number;
            $properties->name = $request->name;
            $properties->category_id = $request->category_id;
            $properties->classification_id = $request->classification_id;
            $properties->description = $request->description;
            $properties->price = $request->price;
            $properties->update();
            
        $images = images::where('property_id', $properties->id)->get();
        if($request->hasFile('file')){
            foreach($images as $images){
                if(File::exists('assets/upload/properties/'.$images->images))
                {
                    File::delete('assets/upload/properties/'.$images->images);
                    $images->delete();
                }
            }
            $files = $request->file('file');
            foreach($files as $file){
                $newName = time().'_'.$file->getClientOriginalName();
                $request['property_id'] = $properties->id;
                $request['images'] = $newName;
                $file->move('assets/upload/properties/',$newName);
                // Image::create($request->all());
                $data = $request->all();
                Images::create($data);
            }
        }
        return redirect()->back()->with('status','Your Property Lot is Updated Successfully');
    }



  }
