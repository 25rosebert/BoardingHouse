<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoardingValidationRequest;
use App\Http\Requests\UpdateBoardingRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Status;
use App\Models\barangay;
use App\Models\Classification;
use App\Models\Locations;
use App\Models\Properties;
use App\Models\Images;
use App\Models\boardinghouse;
use\Illuminate\Support\Facades\File;
class BoardinghouseController extends Controller
{
   
    public function index()
    {
        //
    }

    public function create()
    {
        $category = category::where('id','2')->get();
        $classification = classification::all();        
        $barangays = barangay::all();
        $statuses = status::where('id','4')->get();
        return view('admin.boardingHouse.addBoard',compact('category','classification','barangays','statuses'));
    }
################################################################################################################################################################
################################################################################################################################################################
################################################################################################################################################################
   
    public function store(BoardingValidationRequest $request)
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

        $properties = new properties();
        $properties->business_permit = $name;
        $properties->image = $photoName;
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

        $boardinghouse = new boardinghouse([
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
        $images->save();

        return redirect('/properties')->with('status','Boarding House is Added Successfully');
    }

    public function edit($id)
    {
        $properties = Properties::find($id);
        $category = Category::where('id','2')->get();
        $classification = Classification::all();
        $statuses = status::all();
        return view('admin.boardingHouse.editBoard',compact('properties','classification','category','statuses'));
    }

    public function update(UpdateBoardingRequest $request, $id)
    {
        $validated = $request->validated();
        // dd($validated);
        $properties = properties::find($id);
        if($request->hasFile('permit')){
            if(File::exists('assets/upload/permits/'.$properties->business_permit))
            {
                File::delete('assets/upload/permits/'.$properties->business_permit);
            }
            $file = $request->file('permit');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/permits/',$fileName);
            $properties->business_permit = $fileName;
        }

        // $properties = properties::find($id);
        if($request->hasFile('photo')){
            $path = 'assets/upload/images/'.$properties->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('photo');
            $photoName = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/images/',$photoName);
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
            
            $boardinghouse = boardinghouse::where('property_id', $properties->id)->update([
                'property_id'=>$properties->id,
                'bed'=>$request->bed,
                'rooms'=>$request->room,
                'livingroom'=>$request->livingroom,
                'comfortroom'=>$request->comfortroom,
                'kitchen'=>$request->kitchen,
                'floor_total'=>$request->floor_total,
                'floor_area'=>$request->floor_area
            ]);

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
                return redirect('/properties')->with('status','Boarding House is Updated Successfully');
                                
            }           
    }
    public function destroy($id)
    {
        
    }
}
