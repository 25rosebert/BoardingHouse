<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// use App\Models\RequestProperty;
// use App\Models\RequestHouse;
// use App\Models\RequestBoarding;
// use App\Models\RequestLot;
// use App\Models\RequestLocation;
// use App\Models\RequestImage;
use Auth;
use App\Models\locations;
use App\Models\Properties;
use App\Models\category;
use App\Models\Report;
use Illuminate\Support\Facades\File;
use PDF;

class AdminController extends Controller
{    
    public function dashboard(){
        $user = User::all();
        $properties = Properties::all();
        $locations = locations::all();
        $categories = Category::all();        
        $reports = Report::all();
        // dd($reports);
        
        $houseandlot = Properties::where('category_id',1)->get();
        $boardinghouse = Properties::where('category_id',2)->get()  ;
        $lot = Properties::where('category_id',3)->get();
        // $pendingProperties = RequestProperty::all();
        // dd($pendingProperties);        
        
        return view('admin.dashboard',compact('user','categories','properties','locations','reports','houseandlot','boardinghouse','lot'))->with('success','Annyeong');        
    }

      //Users List Function 
      public function usersList(){
        $users = User::all();

        return view('admin.usersList.index',compact('users'));
    }

    public function toPDF(){
        $users = User::all();
        $pdf = PDF::loadView('admin.usersList.pdf',compact('users'));
        return $pdf->download('users.pdf');
    }

    public function propertylist(){
        $properties = Properties::where('category_id',1)->get();
        $properties_board = Properties::where('category_id',2)->get()  ;
        $properties_lot = Properties::where('category_id',3)->get();
        $pdf = PDF::loadview('admin.properties.propertylist', compact('properties','properties_board', 'properties_lot'));
        return $pdf->download('propertylist.pdf');
    }

    public function delete($id){
        $user = User::find($id);

        $user->delete();
        return back()->with('status','deleted successfully');
    }

    //Locations 
    public function locations()
    {
        $locations = DB::table('locations')->get();
        // $location =locations::all();
        $properties = Properties::all();
        return view('admin.properties.locations',compact('locations','properties'));
    }

    //Profile Page of Admin
    public function editProfile(){
        return view('auth.profile')->with('user',auth()->user());
    }

    //Update Profile Page
    function updateInfo(Request $request){
           
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
     function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('admin_image');
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
    function changePassword(Request $request){
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
             'cnewpassword'=>'required|same:newpassword'
         ],[
             'oldpassword.required'=>'Enter your current password',
             'oldpassword.min'=>'Old password must have atleast 8 characters',
             'oldpassword.max'=>'Old password must not be greater than 30 characters',
             'newpassword.required'=>'Enter new password',
             'newpassword.min'=>'New password must have atleast 8 characters',
             'newpassword.max'=>'New password must not be greater than 30 characters',
             'cnewpassword.required'=>'ReEnter your new password',
             'cnewpassword.same'=>'New password and Confirm new password must match'
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

    //Show Pended Properties in Admin Panel
    public function pendingProperties(){
        $pendingProperties = RequestProperty::all();

        return view('admin.properties.pendingproperties',compact('pendingProperties'));
    }

    // Delete the property if it is rejected

    public function deleteRequest($id){
        $reqProperties = RequestProperty::findorFail($id);

        if($reqProperties->business_permit){
            $path = 'assets/upload/reqPermits/'.$reqProperties->business_permit;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        
        if($reqProperties->image){
            $path = 'assets/upload/reqImages/'.$reqProperties->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $images = RequestImage::where('property_id',$reqProperties->id)->get();
        foreach($images as $image){
            if(File::exists('assets/upload/reqProperties/'.$image->images)){
                File::delete('assets/upload/reqProperties/'.$image->images);
            }
        }
        $reqProperties->delete();
        // $images->delete();
        // if($requestProperties->locations)
       
        return redirect('/pended properties')->with('status','Property is deleted successfully');    
    }

    public function viewProperties(){
        
        $properties = Properties::all();
        return view('admin.properties.propertiesTable',compact('properties'));
    }

    public function search(Request $request){

    }

}

            

            