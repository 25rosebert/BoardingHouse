<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\File;
use App\Models\Images;
use Illuminate\Support\Facades\Mail;
use App\Mail\WarnedUserMail;
class FeedbackController extends Controller
{
    public function feedback(Request $request){
        $validated = $request->validate([
            'fname'=>'required', 'max:255','min:3',
            'lname'=>'required','max:255','min:3',
            'email'=>'required','email',
            'phone'=>'required','regex:^(09|\+639)\d{9}$',
            'message'=>'required', 'min:12','max:255'
        ]);
        if($validated){
            
        }
    }
    // Report
    public function report($id, $name){
    //    dd($name);
    $propertyID = Properties::where('id',$id)->get();    
        return view('landingpage.reportpage',compact('propertyID'));
    }

    public function reportCause(Request $request){
        $validated = $request->validate([
            'propertyId' =>'required',
            'name'       =>'required',
            'reportType' =>'required',
            'description'=>'required|min:10}max:255',
            'offense_count'=>'required'
        ]);
        // dd($validated);
       if($validated){      
        $reports = Report::where('property_id',$request->propertyId)->first();
        // $report = Report::where('report_type',$request->reportType)->first();
        if(!$reports){
        $reported = new Report([
            'property_id' => $request->propertyId,
            'name'        => $request->name,
            'report_type' => $request->reportType,            
            'description' => $request->description,
            'offense_count' =>$request->offense_count
        ]); $reported->save();       
        }
        elseif(Report::where('property_id',$request->propertyId)->exists()){
            $report = Report::where('property_id',$request->propertyId)->first();
            // $offense = $report->offense_count;   
            $reported = Report::where('property_id',$request->propertyId)->update([              
                'report_type'=>$report->report_type.', '.$request->reportType,                
                'description'=>$report->description.', '.$request->description,
                'offense_count' => $request->offense_count + $report->offense_count                        
            ]);                                                
        }        
        else{return back()->with('status','Error');}

       }else{
            return back()->with('status','Please Fill Up All Fields');
       }

       $reportUserId = Report::where('property_id',$request->propertyId)->first();
       if($reportUserId->offense_count === 3){
        // $userId = Properties::where('id',$request->)
        $data = ([
            'property_name'=>$reportUserId->properties->name,
            'owners_name'  =>$reportUserId->properties->user->name,                       
            'report_type'  =>$reportUserId->report_type,
            'description'  =>$reportUserId->description,
            'offense_count'=>$reportUserId->offense_count
        ]);        
                        
        Mail::to($reportUserId->properties->user->email)->send(new WarnedUserMail($data));
       }
    
       return redirect()->back()->with('status','Reported Successfully!');
    }   

}
