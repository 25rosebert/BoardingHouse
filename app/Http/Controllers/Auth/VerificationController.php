<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Models\VerifiedUser;
use App\Models\User;
use Illuminate\Support\Facades\File;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    //Verifying the Users Account
    public function viewUnverifiedAccount(){
        $unVerified = VerifiedUser::where('status',0)->get();
        // dd($unVerified);
        return view('admin.verify.tobeVerify',compact('unVerified'));
    }

    public function viewUserAccount($id){
        $unVerifiedUser = VerifiedUser::where('id',$id)->get();
        // dd($unVerifiedUser);
        return view('admin.verify.unverifiedUser',compact('unVerifiedUser'));
    }

    public function verifyUser($id, $verID){      
        $fully_verified = 1;
        $user = User::where('id',$id)->update([
            'verified'=>$fully_verified,
        ]);         
        $verifiedUser = VerifiedUser::where('id',$verID)->update([
            'status'=>$fully_verified,
        ]);                
        return back()->with('status','User is Successfully Verified');
    }
    public function delete($id)
    {
        $verifiedUser = VerifiedUser::findorFail($id);
            $path1 = 'assets/upload/verification/'.$verifiedUser->frontOfID;
            if(File::exists($path1))
            {
                File::delete($path1);
            }
            $path2 = 'assets/upload/verification/'.$verifiedUser->backOfID;
            if(File::exists($path2))
            {
                File::delete($path2);
            }
            $path3 = 'assets/upload/verification/'.$verifiedUser->photo;
            if(File::exists($path3))
            {
                File::delete($path3);
            }
            $path4 = 'assets/upload/verification/'.$verifiedUser->brgy_clearance;
            if(File::exists($path4))
            {
                File::delete($path4);
            }
        $verifiedUser->delete();
        return back()->with('status','The User Information is successfully deleted');
    }

}
