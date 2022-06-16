<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RequestProperty extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'barangay_id',
        'price',
        'description',
        'business_permit',
        'image',
        'status',
        'category_id',
        'classification_id',      
        'phone',
        'user_id',
      ];

      protected $dates = ['deleted_at'];

      public function category(){
        return $this->belongsTo(category::class,'category_id','id');
      }
      public function classification(){
        return $this->belongsTo(classification::class,'classification_id','id');
      }
      public function user(){
        return $this->belongsTo(User::class,'user_id','id','phone','contact_number');
      }
      public function users(){
        return $this->hasOne(User::class,'user_id','id');
      }
      public function status(){
        return $this->belongsTo(status::class,'status','id');
       }
      public function barangay(){
      return $this->belongsTo(barangay::class,'barangay_id','id');
      }
      public function reqLocation(){
        return $this->hasOne(RequestLocation::class,'property_id','id');
      }
      public function reqLocations(){
        return $this->hasMany(RequestLocation::class,'property_id','id');
      }
      public function reqBoarding(){
        return $this->hasOne(RequestBoarding::class,'property_id','id');
      }
      public function reqHouse(){
        return $this->hasOne(RequestHouse::class,'property_id','id');
      }
      public function reqHouses(){
        return $this->hasMany(RequestHouse::class,'property_id','id');
      }
      public function reqLot(){
        return $this->hasOne(RequestLot::class,'property_id','id');
      }
      public function reqImage(){
        return $this->hasOne(RequestImage::class,'property_id','id');
      }
      public function reqImages(){
        return $this->hasMany(RequestImage::class,'property_id','id');
      }



      
}
