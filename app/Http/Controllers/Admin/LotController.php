<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\LotValidationRequest;
use App\Http\Requests\UpdateLotRequest;
use App\Models\Category;
use App\Models\Classification;
use App\Models\properties;
use App\Models\Status;
use App\Models\barangay;
use App\Models\locations;
use App\Models\lot;
use App\Models\images;
use Illuminate\Support\Facades\File;
class LotController extends Controller
{
    public function addLot(){
        $category = category::where('id','3')->get();
        $classification = classification::all();
        $barangays = barangay::all();
        $statuses = status::where('id','4')->get();
        return view('admin.lot.addLot',compact('category','classification','barangays','statuses'));
    }
    public function storeLot(LotValidationRequest $request){
        //Validation Check 
        $validated = $request->validated();

        // dd($validated);     //Check the inputed data by dump and die method
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/images/',$fileName);
        }
        $properties = new properties([
            'name'=>$request->name,
            'price'=>$request->price,
            'barangay_id'=>$request->barangay_id,
            'status'=>$request->status,
            'description'=>$request->description,
            // 'business_permit',
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
            'landmarks'=>$request->landmark
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
        return redirect('properties')->with('status','Lot Has Been Added Successfully');
    }

    public function editLot($id){
        $properties = properties::find($id);
        $category = category::where('id',$properties->category_id)->get();
        $classification = classification::all();
        $statuses = status::all();
        return view('admin.lot.editLot',compact('properties','classification','category','statuses'));
    }

    public function updateLot(UpdateLotRequest $request, $id){
        $validated = $request->validated();     
        // dd($validated);   //test again if the input request are valid 
        $properties = properties::find($id);            
        if($request->hasFile('photo')){
            if(File::exists('assets/upload/images/'.$properties->image)){
                File::delete('assets/upload/images/'.$properties->image);
            }
            $file = $request->file('photo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/images/',$fileName);
            $properties->image = $fileName;
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
        return redirect('/properties')->with('status','Property Lot is Updated Successfully');
    }
}
