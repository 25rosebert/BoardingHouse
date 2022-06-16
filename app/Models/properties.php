<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\classification;
use App\Models\category;
use App\Models\boardinghouse;
use App\Models\houseandlot;
use App\Models\lot;
use App\Models\location;
use Laravel\Scout\Searchable;
class properties extends Model
{
    use HasFactory;
    use Searchable;
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
      'nearby_places',
    ];
    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function classification(){
        return $this->belongsTo(classification::class,'classification_id','id');
    }
    public function images(){
        return $this->hasMany(Images::class,'property_id','id');
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
    public function statuses(){
        return $this->hasOne(status::class,'status','id');
    }
    public function barangay(){
        return $this->belongsTo(barangay::class,'barangay_id','id');
    }
    public function locations(){
        return $this->hasOne(locations::class,'property_id','id');
    }
    public function manyLocation(){
        return $this->hasMany(locations::class,'property_id','id');
    }
    public function houseandlot(){
        return $this->hasOne(houseandlot::class,'property_id','id');
    }
    public function houseandlots(){
        return $this->hasMany(houseandlot::class,'property_id','id');
    }
    public function boardinghouse(){
        return $this->hasOne(boardinghouse::class,'property_id','id');
    }
    public function boardinghouses(){
        return $this->hasMany(boardinghouse::class,'property_id','id');
    }
    public function lots(){
        return $this->hasMany(lot::class,'property_id','id');
    }
    public function lot(){
        return $this->hasOne(lot::class,'property_id','id');
    }
    public function report(){
        return $this->hasOne(Report::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }

}
