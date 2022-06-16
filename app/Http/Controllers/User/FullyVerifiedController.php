<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VerifiedUser;
use App\Models\User;

class FullyVerifiedController extends Controller
{
    public function verify(){
        return view('auth.fullyverification');
    }
    public function verifiedAccount(Request $request){
        $validated = $request->validate([
            'users_id'      =>'required',
            'age'           =>'required|min:1|max:2',
            'birthdate'     =>'required',
            'id_type'       =>'required',
            'frontOfID.*'=>'required|image|mimes:jpg,png,jpeg,gif',
            'backOfID.*'=>'required|image|mimes:jpg,png,jpeg,gif',
            'photo.*'=>'required|image|mimes:jpg,png,jpeg,gif',
            'brgy_clearance.*'=>'required|image|mimes:jpg,png,jpeg,gif',
        ]);
        $users_id = $request->users_id;
        // dd($users_id);
        if(VerifiedUser::where('users_id',$users_id)->exists($users_id)){
            return back()->with('status','You Already submitted a Fully verification request form please wait');
        }
        // dd($validated);
        // return $request->input();
        if($request->hasFile('frontOfID')){
            $file = $request->file('frontOfID');
            $frontOfID = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/verification/',$frontOfID);
        }
        else{
            return back()->with('status','Please Insert a Photo of your ID');
        }
        if($request->hasFile('backOfID')){
            $file = $request->file('backOfID');
            $backOfID = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/verification/',$backOfID);
        }
        else{
            return back()->with('status','Please Insert a Photo of your ID');
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $photo = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/verification/',$photo);
        }
        else{
            return back()->with('status','Please Fill up all fields');
        }
        if($request->hasFile('brgy_clearance')){
            $file = $request->file('brgy_clearance');
            $brgy_clearance = time().'_'.$file->getClientOriginalName();
            $file->move('assets/upload/verification/',$brgy_clearance);
        }else{
            return back()->with('status','Please fill up sll fields');
        }

        $userToBeVerify = new VerifiedUser();
        $userToBeVerify->users_id = $request->users_id;
        $userToBeVerify->age = $request->age;
        $userToBeVerify->birthdate = $request->birthdate;
        $userToBeVerify->id_type = $request->id_type;    
        $userToBeVerify->frontOfID = $frontOfID;             
        $userToBeVerify->backOfID = $backOfID;        
        $userToBeVerify->photo = $photo;          
        $userToBeVerify->brgy_clearance = $brgy_clearance;
        $userToBeVerify->save();

        if($userToBeVerify->save()){
            return redirect('/home')->with('status','Please wait for One to three working days');
        }
        else{
            return back()->with('status','Please Check your inputs');
        }
    }
}
