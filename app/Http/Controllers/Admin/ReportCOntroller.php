<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\Report;
use App\Models\Status;
use App\Models\Images;
use Illuminate\Support\Facades\File;
class ReportCOntroller extends Controller
{
    public function viewReport($id, $propID){        
        $report = Report::where('id',$id)->get();        
        $properties = Properties::where('id',$propID)->get();       

        // $offense = Report::where('property_id',$propID)->where('offense_count',1)->get();
        // $offenseCount = Report::where('offense_count',)->get();

        // dd($offense);
        // $offenseCount = Report::where('property_id',$propID)->get();
        // $report = Report::where('property_id',$propID)->update([                
        //         if (Report::where('property_id',$propID)->exists()) {            
        //         'offense_count'=> $offenseCount->offense_count
        //     ]);
        // dd($report);
        // }
               
        return view('admin.report.viewreport',compact('report','properties'));
    }

    public function warnedUser($id, $propID){
        
        return redirect()->back()->with('status','Warning message was sent to the User');
    }

public function deleteReport($id){
        $report = Report::where('id',$id)->delete();                

        return redirect()->back()->with('status','The reported property is deleted successfully');
    }

    public function deleteReportProperty($propId){
        $report = Report::where('property_id',$propId)->delete();                
        $properties = Properties::find($propId);

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
        return redirect()->back()->with('status','Reported Property is Deleted Successfully');

    }

}
