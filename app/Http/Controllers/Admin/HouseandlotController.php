<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseValidationRequest;
use App\Http\Requests\UpdateHouseRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Status;
use App\Models\barangay;
use App\Models\Classification;
use App\Models\Locations;
use App\Models\Properties;
use App\Models\Images;
use App\Models\houseandlot;
use\Illuminate\Support\Facades\File;
class HouseandlotController extends Controller
{
    public function addHouseLot(){
        $category = category::where('id', '1')->get();
        $classification = classification::all();
        $barangays = barangay::all();
        $statuses = status::where('id','4')->get();
        return view('admin.houseAndLot.addHouse',compact('category','classification','barangays','statuses'));
    }

    public function store(HouseValidationRequest $request){  

        $validated = $request->validated();
        // dd($validated);
            if($request->hasfile('permit')){
                $file = $request->file('permit');
                 $imageName = $file->getClientOriginalName();
                 $newName = time().'.'.$imageName;
                 $file->move('assets/upload/permits/', $newName);
             }
             else{
                //  return back()->with('status','Please fill up all fields');
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
             $properties->barangay_id = $request->barangay_id;
             $properties->status = $request->status;
             $properties->user_id = $request->user_id;
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
                'landmarks'=>$request->landmark
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
          
              
        return redirect('/properties')->with('status','Property is added successfully');

    }
    //Edit Property
    public function editHouse($id){
        $properties = Properties::find($id);
        $category = Category::where('id','1')->get();
        $classification = Classification::all();
        $statuses = status::all();
        return view('admin.houseAndLot.editHouse',compact('properties','classification','category','statuses'));
    }
    //Update Property
    public function updateHouse(UpdateHouseRequest $request, $id){
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
            $properties->phone = $request->contact_number;
            $properties->name = $request->name;
            $properties->status = $request->status;
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
        return redirect('/properties')->with('status','Property is Updated Successfully');
    }

    public function destroy($id){
        $properties = Properties::findorFail($id);
        if($properties->business_permit){
            $path = 'assets/upload/permits/'.$properties->business_permit;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        if($properties->image){
            $path = 'assets/upload/images/'.$properties->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $images = Images::where('property_id',$properties->id)->get();
        foreach($images as $image){
            if(File::exists('assets/upload/properties/'.$image->images)){
                File::delete('assets/upload/properties/'.$image->images);
            }
        }
        $properties->delete();
        return redirect('/properties')->with('status','Property is deleted successfully');
    }
}