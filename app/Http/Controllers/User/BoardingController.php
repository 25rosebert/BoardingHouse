<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PropertyNotification;
use App\Http\Requests\BoardingValidationRequest;
use App\Http\Requests\UpdateBoardingRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Barangay;
use App\Models\Status;
use App\Models\Classification;
use App\Models\Locations;
use App\Models\Properties;
use App\Models\Images;
use App\Models\boardinghouse;
use\Illuminate\Support\Facades\File;


class BoardingController extends Controller
{
    public function add(){
        $category = category::where('id','2')->get();
        $classification = classification::all();
        $statuses = status::where('id','4')->get();
        $barangays = barangay::all();
        return view('user.boarding.add',compact('category','classification','statuses','barangays'));
    }

    public function store(BoardingValidationRequest $request)
    {
        // $user = User::all();
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
            'landmarks' => $request->landmark
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

        // Notification::send($user, new PropertyNotification($request->name));

        return redirect()->back()->with('status','Your Property is submitted successfully please wait for confirmation');
    }

    public function edit($id){
        $category = category::where('id','2')->get();
        $classification = classification::all();
        $properties = properties::find($id);
        $statuses = status::all();

        return view('user.boarding.edit',compact('category','classification','properties','statuses'));
    }

    public function update(UpdateBoardingRequest $request, $id){
        $validated = $request->validated();
        //  dd($validated);
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
            $properties->status = $request->status;
            $properties->phone = $request->contact_number;
            $properties->name = $request->name;
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
        }
        return redirect('/my properties')->with('status','Boarding House is Updated Successfully');

    }

}
