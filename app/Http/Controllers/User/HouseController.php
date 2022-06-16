<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseValidationRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Models\category;
use App\Models\Classification;
use App\Models\properties;
use App\Models\locations;
use App\Models\Images;
use App\Models\Barangay;
use App\Models\status;
use App\Models\houseandlot;
use App\Models\boardinghouse;
use App\Models\lot;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function add(){
        $category = category::where('id','1')->get();
        $classification = classification::all();
        $barangays = Barangay::all();
        $statuses = status::where('id','4')->get();
        return view('user.houseandlot.add',compact('category','classification','barangays','statuses'));
    }
    
    public function store(HouseValidationRequest $request){
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
         $properties = new Properties();
         $properties->image = $photoName;
         $properties->business_permit = $newName;
         $properties->user_id = $request->user_id;
         $properties->barangay_id = $request->barangay_id;
         $properties->status = $request->status;
         $properties->phone = $request->contact_number;
         $properties->name = $request->name;
         $properties->category_id = $request->category_id;
         $properties->classification_id = $request->classification_id;
         $properties->description = $request->description;
         $properties->price = $request->price;
         $properties->save();

         $location = new locations([
            'property_id' => $properties->id,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'landmarks' => $request->landmark,
        ]);
        $location->save();

        $houseandlot = new houseandlot([
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
        return redirect()->back()->with('status','House and Lot is Added and Posted Successfully');
    }

    public function edit($id){
        $properties = Properties::find($id);
        $category_house = Category::where('id','1')->get();
        $classification = Classification::all();
        $statuses = status::all();

        return view('user.houseandlot.edit',compact('properties','classification','category_house','statuses'));
    }

    public function update(UpdateHouseRequest $request, $id){
        $validated = $request->validated();
        // dd($validated);
        $properties = properties::find($id);
        //Business permit
            if($request->hasfile('permit')){     //check if the form fied has a image
                $path = 'assets/upload/permits/'.$properties->business_permit;
                if(File::exists($path))
                {
                     File::delete($path);
                }
                $file = $request->file('permit');
                 $imageName = $file->getClientOriginalName();
                 $newName = time().'.'.$imageName;
                 $file->move('assets/upload/permits/', $newName);
                 $properties->business_permit = $newName;
             }
             //Property Picture
             if($request->hasfile('photo')){
                $path = 'assets/upload/images/'.$properties->image;
               if(File::exists($path))
               {
                    File::delete($path);
               }
               $photo = $request->file('photo');
               $extension = $photo->getClientOriginalExtension();
               $photoName = time().'.'.$extension;
               $photo->move('assets/upload/images/', $photoName);
               $properties->image = $photoName;
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

        $houseandlot = houseandlot::where('property_id', $properties->id)->update([
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
        // $houseandlot->update($request->all());
           
        //Images of the Property
        $images = images::where('property_id',$properties->id)->get();
        if($request->hasFile('file')){
            foreach($images as $images){
            
                $path = 'assets/upload/properties/'.$images->images;
                if(File::exists($path))
                {
                    File::delete($path);
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
        return redirect('/my properties')->with('status','Property is Updated Successfully');

    }
}
