<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Classification;
use App\Models\RequestLocation;
use App\Models\RequestProperty;
use App\Models\RequestImage;
use App\Models\RequestHouse;
use App\Models\status;
use App\Models\barangay;
use App\Models\RequestBoarding;
use App\Models\RequestLot;
use App\Models\Locations;
use App\Models\Properties;
use App\Models\Images;
use App\Models\boardinghouse;
use App\Models\houseandlot;
use App\Models\Lot;
use App\Http\Requests\BoardingValidationRequest;
use App\Http\Requests\HouseValidationRequest;
use App\Http\Requests\LotValidationRequest;
use\Illuminate\Support\Facades\File;
use App\Mail\ApprovePropertyMail;
use Illuminate\Support\Facades\Mail;
class ApprovePropertyController extends Controller
{
    //Show Request properties by their ID
    public function viewReqHouse($id){
        $properties = RequestProperty::where('id', $id)->get();        
        return view('admin.properties.viewRequestHouse',compact('properties'));
    }
    public function viewReqBoarding($id){
        $properties = RequestProperty::where('id', $id)->get();
        return view('admin.properties.viewReqBoarding',compact('properties'));
    }
    public function viewReqLot($id){
        $properties = RequestProperty::where('id', $id)->get();        
        return view('admin.properties.viewReqLot',compact('properties'));
    }

    public function approveLot($id)
    {
        $reqProperty= RequestProperty::where('id', $id)->first();
        //Request Properties Table
        $name = $reqProperty->name;
        $barangay_id = $reqProperty->barangay_id;
        $status = $reqProperty->status;
        // dd($barangay_id);
        $price = $reqProperty->price;
        $description = $reqProperty->description;
        $business_permit = $reqProperty->business_permit;
        $image = $reqProperty->image; 
        $propImage = public_path('assets/upload/images/'.$image);
        $category_id = $reqProperty->category_id;
        $classification_id = $reqProperty->classification_id;
        $phone = $reqProperty->phone;
        $user_id = $reqProperty->user_id;
        
        //Request Locations Table
        $loc_property_id = $reqProperty->reqLocation->property_id;
        $address = $reqProperty->reqLocation->address;
        $latitude = $reqProperty->reqLocation->latitude;
        $longitude = $reqProperty->reqLocation->longitude;
        
        //Request Lot Table 
        $lot_property_id = $reqProperty->reqLot->property_id;
        $land_size = $reqProperty->reqLot->land_size;
        
        //Request Image Table
         $image_property_id = $reqProperty->reqImage->property_id;
         if ($reqProperty->reqImages) {
            foreach ($reqProperty->reqImages as $reqProp_images) {
                $reqPropImage = $reqProp_images->images;
            } 
         }
        //  dd($reqPropImage);
        $reqProperty->forceDelete();

        // if($business_permit->hasFile('business_permit'))

        $properties = new properties();

        $properties->name = $name;
        $properties->barangay_id = $barangay_id;
        $properties->status = $status;
        $properties->price = $price;
        $properties->description = $description;    
        $properties->business_permit = $business_permit;
        $properties->image = $image;

        
        $properties->category_id = $category_id;
        $properties->classification_id = $classification_id;
        $properties->phone = $phone;
        $properties->user_id = $user_id;

        $properties->save();

        $locations = new locations();
    

        $locations                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ->property_id = $properties->id;
        $locations->address = $address;
        $locations->latitude = $latitude;
        $locations->longitude = $longitude;
        $locations->save();

        $lots = new lot();
        $lots->property_id = $properties->id;
        $lots->land_size = $land_size;
        $lots->save();

        $images = new images();
        $images->property_id = $properties->id;
        $images->images = $reqPropImage;
        $images->save();

        $data = ([
            'name' => $properties->user->name,
            'property_name'=>$properties->name,
            'price' => $properties->price,
            'description' => $properties->description,
        ]);
        // return redirect()->back()->with('status','Property is Added Successfully!');
        Mail::to($properties->user->email)->send(new ApprovePropertyMail($data));

          return redirect()->back()->with('status','Property is Added Successfully!');
    }
###############################################################################################
###############################################################################################
###############################################################################################
    public function approveHouse($id)
    {
        $reqProperty= RequestProperty::where('id', $id)->first();
        //Request Properties Table
        $name = $reqProperty->name;
        $barangay_id = $reqProperty->barangay_id;
        $status = $reqProperty->status;
        // dd($barangay_id);
        $price = $reqProperty->price;
        $description = $reqProperty->description;
        $business_permit = $reqProperty->business_permit;
        $image = $reqProperty->image;
        $category_id = $reqProperty->category_id;
        $classification_id = $reqProperty->classification_id;
        $phone = $reqProperty->phone;
        $user_id = $reqProperty->user_id;
        
        //Request Locations Table
        $loc_property_id = $reqProperty->reqLocation->property_id;
        $address = $reqProperty->reqLocation->address;
        $latitude = $reqProperty->reqLocation->latitude;
        $longitude = $reqProperty->reqLocation->longitude;
        
        //Request House Table 
        $house_property_id = $reqProperty->reqHouse->property_id;
        $livingroom = $reqProperty->reqHouse->livingroom;
        $bedroom = $reqProperty->reqHouse->bedroom;
        $comfortroom = $reqProperty->reqHouse->comfortroom;
        $kitchen = $reqProperty->reqHouse->kitchen;
        $floor_area = $reqProperty->reqHouse->floor_area;
        $floor_total = $reqProperty->reqHouse->floor_total;
        $parking_lot = $reqProperty->reqHouse->parking_lot;
        $land_size = $reqProperty->reqHouse->land_size;
        
        //Request Image Table
         $image_property_id = $reqProperty->reqImage->property_id;
         if ($reqProperty->reqImages) {
            foreach ($reqProperty->reqImages as $reqProp_images) {
                $reqPropImage = $reqProp_images->images;
                // dd($reqPropImage);
            } 
         }

        $reqProperty->forceDelete();

        $properties = new properties();

        $properties->name = $name;
        $properties->barangay_id = $barangay_id;
        $properties->status = $status;
        $properties->price = $price;
        $properties->description = $description;
        $properties->business_permit = $business_permit;
        $properties->image = $image;
        $properties->category_id = $category_id;
        $properties->classification_id = $classification_id;
        $properties->phone = $phone;
        $properties->user_id = $user_id;

        $properties->save();

        $locations = new locations();
    
        $locations->property_id = $properties->id;
        $locations->address = $address;
        $locations->latitude = $latitude;
        $locations->longitude = $longitude;
        $locations->save();

        $houseandlot = new houseandlot();
        $houseandlot->property_id = $properties->id;
        $houseandlot->bedroom = $bedroom;
        $houseandlot->livingroom = $livingroom;
        $houseandlot->comfortroom = $comfortroom;
        $houseandlot->kitchen = $kitchen;
        $houseandlot->floor_total = $floor_total;
        $houseandlot->floor_area = $floor_area;
        $houseandlot->parking_lot = $parking_lot;
        $houseandlot->land_size = $land_size;
        $houseandlot->save();

        $images = new images();
        $images->property_id = $properties->id;
        $images->images = $reqPropImage;
        $images->save();
        
        $data = ([
            'name' => $properties->user->name,
            'property_name'=>$properties->name,
            'price' => $properties->price,
            'description' => $properties->description,
        ]);
        // return redirect()->back()->with('status','Property is Added Successfully!');
        Mail::to($properties->user->email)->send(new ApprovePropertyMail($data));

        return redirect()->back()->with('status','Property is Added Successfully!');
    }

###############################################################################################
###############################################################################################
###############################################################################################

public function approveBoard($id)
{
    $reqProperty= RequestProperty::where('id', $id)->first();
    //Request Properties Table
    $name = $reqProperty->name;
    $barangay_id = $reqProperty->barangay_id;
    $status = $reqProperty->status;
    // dd($barangay_id);
    $price = $reqProperty->price;
    $description = $reqProperty->description;
    $business_permit = $reqProperty->business_permit;
    $image = $reqProperty->image;
    $category_id = $reqProperty->category_id;
    $classification_id = $reqProperty->classification_id;
    $phone = $reqProperty->phone;
    $user_id = $reqProperty->user_id;
    
    //Request Locations Table
    $loc_property_id = $reqProperty->reqLocation->property_id;
    $address = $reqProperty->reqLocation->address;
    $latitude = $reqProperty->reqLocation->latitude;
    $longitude = $reqProperty->reqLocation->longitude;
    
    //Request Boarding House Table 
    $boarding_property_id = $reqProperty->reqBoarding->property_id;
    $livingroom = $reqProperty->reqBoarding->livingroom;
    $bed = $reqProperty->reqBoarding->bed;
    $rooms = $reqProperty->reqBoarding->rooms;
    $comfortroom = $reqProperty->reqBoarding->comfortroom;
    $kitchen = $reqProperty->reqBoarding->kitchen;
    $floor_area = $reqProperty->reqBoarding->floor_area;
    $floor_total = $reqProperty->reqBoarding->floor_total;
    
    //Request Image Table
    $image_property_id = $reqProperty->reqImage->property_id;
    if ($reqProperty->reqImages) {
       foreach ($reqProperty->reqImages as $reqProp_images) {
           $reqPropImage = $reqProp_images->images;
           // dd($reqPropImage);
        
       } 
    }

    $reqProperty->forceDelete();

    $properties = new properties();

    $properties->name = $name;
    $properties->barangay_id = $barangay_id;
    $properties->status = $status;
    $properties->price = $price;
    $properties->description = $description;
    $properties->business_permit = $business_permit;
    $properties->image = $image;
    $properties->category_id = $category_id;
    $properties->classification_id = $classification_id;
    $properties->phone = $phone;
    $properties->user_id = $user_id;

    $properties->save();

    $locations = new locations();

    $locations->property_id = $properties->id;
    $locations->address = $address;
    $locations->latitude = $latitude;
    $locations->longitude = $longitude;
    $locations->save();

    $boardinghouse = new boardinghouse();
    $boardinghouse->property_id = $properties->id;
    $boardinghouse->bed = $bed;
    $boardinghouse->rooms = $rooms;
    $boardinghouse->livingroom = $livingroom;
    $boardinghouse->comfortroom = $comfortroom;
    $boardinghouse->kitchen = $kitchen;
    $boardinghouse->floor_total = $floor_total;
    $boardinghouse->floor_area = $floor_area;
    $boardinghouse->save();

    $images = new images();
    $images->property_id = $properties->id;
    $images->images = $reqPropImage;
    $images->save();

    $data = ([
        'name' => $properties->user->name,
        'property_name'=>$properties->name,
        'price' => $properties->price,
        'description' => $properties->description,
    ]);
    // return redirect()->back()->with('status','Property is Added Successfully!');
    Mail::to($properties->user->email)->send(new ApprovePropertyMail($data));

    return redirect()->back()->with('status','Property is Added Successfully!');
    }
}
