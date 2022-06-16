<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
class SendEmailController extends Controller
{  
    public function sendEmail(){

        // $user = user::();

        $propertyDetail = [
            'body' => 'Hello Fellow Users welcome into our Website propertyfinder.com',
            'propertyText' => 'Good Day to you, our new user',
            'url' => url('myhousing.com'),
            'message' => 'Browse Properties near you, Or list your property here'
        ];

        // Notification::send($user, new SendEmailNotification($propertyDetail));

        return redirect('dashboard')->with('status','Notification was sent successfully');
    }
}
