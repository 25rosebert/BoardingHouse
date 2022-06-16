<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\RequestProperty;
use App\Models\RequestImage;
use App\Models\Category;
use App\Models\Images;
use App\Models\User;
use App\Models\Classification;
use App\Models\locations;
use \Illuminate\Support\Facades\Auth;
use\Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myProperties()
    {
        $user = Auth::user();
        $properties = Properties::where('user_id',$user->id)->orderBy('id','desc')->get();
        $classification = Classification::all();
        $category = Category::all();
        return view('user.index',compact('properties','classification','category'));
    }
    public function reqProperties()
    {
        $user = Auth::user();
        $reqProperties = RequestProperty::where('user_id',$user->id)->orderBy('id','desc')->get();
        $classification = Classification::all();
        $category = Category::all();
        return view('user.viewrequest',compact('reqProperties','classification','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Seller Routes
    public function addProperty(){
        $properties = Properties::all();
        $category = Category::all();
        $classification = Classification::all();
        return view('user.add',compact('properties','category','classification'));
    }

    public function saveProperty(Request $request)
    {
        $validated = $request->validate([
            'photo'=>'required|image|mimes:jpg,png,jpeg,gif',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif',
            'file.*'=>'required|image|mimes:jpg,png,jpeg,gif',
                    'name'=>'required|max:255"|min:12|unique:properties',
                    'address' => 'required|min:15|max:266',  //regex:/(^[-0-9A-Za-z.,\/ ]+$)/
                    'category_id'=>'required',
                    'classification_id'=>'required',
                    'description'=>'required','min:30','max:255',
                    'price'=>'required|min:2|max:12',
                    'floor_area'=>'required|min:2|max:12',
                    'floor_total'=>'required|min:0|max:12',
                    'land_size'=>'required|min:2|max:12',
                    'user_id'=>'required',
                    'latitude'=> 'required',
                    'longitude'=>'required',
        ]);
     //   dd($validated);

        $properties = new Properties();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newName = time().'.'.$extension;
            $file->move('assets/upload/images/',$newName);
           
        }else{
            return back()->with('error','Please insert a photo requirements');
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileExt = $file->getClientOriginalExtension();
            $photoName = date('month').'.'.$fileExt;
            $file->move('assets/upload/images/',$photoName);
    
        }
        else{
            return back()->with('error','Please insert a photo requirements');
        }       
        
                $properties->image = $photoName;
                $properties->business_permit = $newName;
                $properties->user_id = $request->input('user_id');
                $properties->phone = $request->input('contact_number');
                $properties->name = $request->input('name');
                $properties->address = $request->input('address');
                $properties->category_id = $request->input('category_id');
                $properties->classification_id = $request->input('classification_id');
                $properties->description = $request->input('description');
                $properties->price = $request->input('price');
                $properties->floor_area = $request->input('floor_area');
                $properties->floor_total = $request->input('floor_total');
                $properties->land_size = $request->input('land_size');
                $properties->save();
                
                $location = new locations();
                $location->property_id = $properties->id;
                $location->latitude = $request->input('latitude');
                $location->longitude = $request->input('longitude');
                $location->save();

                if($request->hasFile('file')){
                    $files = $request->file('file');
                    foreach($files as $file){
                        $newName = time().'_'.$file->getClientOriginalName();
                        $request['property_id'] = $properties->id;
                        $request['images'] = $newName;
                        $file->move('assets/upload/properties/',$newName);
                        Images::create($request->all());    
                    }
                }       
                return back()->with('success','Property is Added Successfully');
    }

    public function edit($id)
    {
        $properties = Properties::find($id);
        $category = Category::all();
        $classification = Classification::all();
        return view('user.edit',compact('properties','classification','category'));
    }

    
    //Update Properties Function
    public function update(Request $request, $id){
        $validated = $request->validate([
            // 'photo'=>'required|image|mimes:jpg,png,jpeg,gif',
            // 'image'=>'required|image|mimes:jpg,png,jpeg,gif',
            'name'=>'required|max:255"|min:12',
            'address' => 'required|min:15|max:266',
            'category_id'=>'required',
            'classification_id'=>'required',
            'description'=>'required','min:30','max:255',
            'price'=>'required|min:3|max:12',
            'floor_area'=>'required|min:2|max:12',
            'floor_total'=>'required|min:0|max:2',
            'land_size'=>'required|min:2|max:12',
            'user_id'=>'required',
            'contact_number'=>'required'
        ]);
        // dd($validated);    #dump and die checking the input data from the user
        $properties = Properties::find($id);
        if($request->hasFile('image')){
            $path = 'assets/upload/images/'.$properties->business_permit;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time().'.'.$extension;
            $file->move('assets/upload/images/',$imageName);
            $properties->business_permit = $imageName;    
        } 
        // else{
        //     return back()->with('error','Please Fill up the required field');
        // }
        if($request->hasFile('photo')){
            $path = 'assets/upload/images/'.$properties->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('photo');
            $fileExt = $file->getClientOriginalExtension();
            $photoName = date('month').'.'.$fileExt;
            $file->move('assets/upload/images/',$photoName);
            $properties->image = $photoName;
        } 
        // else{
        //     return back()->with('error','Please Fill up the required field');
        // }
        
        $properties->user_id = $request->input('user_id');
        $properties->phone = $request->input('contact_number');
        $properties->name = $request->input('name');
        $properties->address = $request->input('address');
        $properties->category_id = $request->input('category_id');
        $properties->classification_id = $request->input('classification_id');
        $properties->description = $request->input('description');
        $properties->price = $request->input('price');
        $properties->floor_area = $request->input('floor_area');
        $properties->floor_total = $request->input('floor_total');
        $properties->land_size = $request->input('land_size');
        $properties->update();
        
        $images = images::where('property_id',$properties->id)->get();
        if($request->hasFile('file')){
            foreach($images as $images){
            
                $path = 'assets/upload/properties/'.$images->images;
                if(File::exists($path))
                {
                    File::delete($path);
                }
                $images->delete();
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
    
        
        return redirect('my properties')->with('success','your property is updated successfully');
    }

    public function destroy($id){
        $properties = Properties::findorFail($id);
        if($properties->business_permit && $properties->image){
            $path = 'assets/upload/images/'.$properties->business_permit && $properties->image;
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
        return back()->with('status','Property is deleted successfully');
    }
    //delete request property 
    public function delete($id){
        $properties = RequestProperty::findorFail($id);
        if($properties->business_permit && $properties->image){
            $path = 'assets/upload/images/'.$properties->business_permit && $properties->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $images = RequestImage::where('property_id',$properties->id)->get();
        foreach($images as $image){
            if(File::exists('assets/upload/properties/'.$image->images)){
                File::delete('assets/upload/properties/'.$image->images);
            }
        }
        $properties->delete();
        return back()->with('status','Property is deleted successfully');
    }


    //Delete property image function
    public function deleteImage($id)
    {
        $properties = Properties::findorFail($id);
        $path = 'assets/upload/images/'.$properties->image;
        if(File::exists($path))
        {
           File::delete($path);
        }
        return back()->with('status','image has been removed');
    }

    //User Profile
    public function profile(){

        return view('user.profile')->with('status','Welcome to your profile page');
    }

    //Update Profile
    public function updateProfile(request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email',
            'username'=>'required',
            'contact_number'=>'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'username'=>$request->username,
                'contact_number'=>$request->contact_number,
             ]);

             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
             }
        }
    }

    
    //Update Profile Image
    function updateProfilePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('user_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image  
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
        }
    }

    
      //CHange Password
      public function changePassword(Request $request){
        //Validate form
        $validator = \Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
             ],
             'newpassword'=>'required|min:8|max:30',
             'reEnterpassword'=>'required|same:newpassword'
         ],[
             'oldpassword.required'=>'Enter your current password',
             'oldpassword.min'=>'Old password must have atleast 8 characters',
             'oldpassword.max'=>'Old password must not be greater than 30 characters',
             'newpassword.required'=>'Enter new password',
             'newpassword.min'=>'New password must have atleast 8 characters',
             'newpassword.max'=>'New password must not be greater than 30 characters',
             'reEnterpassword.required'=>'ReEnter your new password',
             'reEnterpassword.same'=>'New password and Confirm new password must match'
         ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             
         $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

         if( !$update ){
             return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
         }else{
             return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
         }
        }
    }


}
