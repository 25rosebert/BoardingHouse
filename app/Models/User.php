<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Properies;
use Laravel\Scout\Searchable;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    // use Searchable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'picture',
        'contact_number',
    ];

        public function properties(){
            return $this->hasOne(Properties::class);
        }
        public function verifiedUser(){
            return $this->hasOne(VerifiedUser::class);
        }
        public function report(){
            return $this->hasOne(Report::class);
        }
        public function reports(){
            return $this->hasMany(Report::class);
        }
        public function user(){
            return $this->belongsTo(Properties::class,'user_id','id');
        }
        public function reqProperty(){
            return $this->hasOne(RequestProperty::class);
        }
        public function reqUser(){
            return $this->belongsTo(RequestProperty::class,'user_id','id');
        }

        
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getPictureAttribute($value){
        if($value){
            return asset('users/images/'.$value);
        }else{
            return asset('users/images/no-image.png');
        }
    }
}
