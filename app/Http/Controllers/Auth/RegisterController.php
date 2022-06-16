<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:10', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8 ', 'confirmed'],
            'username'=>['required','unique:users'],
            'contact_number' =>['required','regex:/((^(\+)(\d){12}$)|(^\d{11}$))/']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'username' => $data['username'],
    //         'contact_number' => $data['contact_number'],
    //     ]);
    // }
    
    public function terms(){
        return view('pages.termsandconditions');
    }

    function register(Request $request){

        $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'username'=>['required','unique:users'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
           'contact_number' =>['required','unique:users','regex:/((^(\+)(\d){12}$)|(^\d{11}$))/'],
           'agree'=>['required'],              
        ],[
            'agree.required'=>'You must agree with our Terms and Conditions'
        ]);

        //    /** Make avatar */c

           $path = 'users/images/';
           $fontPath = public_path('fonts/Oliciy.ttf');
           $char = strtoupper($request->name[0]);
           $newAvatarName = rand(12,34353).time().'_avatar.png';
           $dest = $path.$newAvatarName;
  
           $createAvatar = makeAvatar($fontPath,$dest,$char);
           $picture = $createAvatar == true ? $newAvatarName : '';
  
           $user = new User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->username = $request->username;
           $user->role_as = 0;
           $user->contact_number = $request->contact_number;
           $user->picture = $picture;
           $user->password = \Hash::make($request->password);

           $data = ([
               'name' => $request->get('name'),
               'email' => $request->get('email'),
               'username' => $request->get('username'),
               'contact_number' => $request->get('contact_number')
           ]);

           if( $user->save() ){
                Mail::to($user->email)->send(new WelcomeMail($data));
              return redirect()->back()->with('status','You are now successfully registered');
           }else{
               return redirect()->back()->with('status','Failed to register');
           }
    }
}
