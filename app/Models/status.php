<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\properties;
class status extends Model
{
    use HasFactory;
    protected $fillable =[
        'status'
    ];

    // public function properties(){
    //     return $this->hasMany(Properties::class,'status','id');
    // }
    public function properties(){
        return $this->hasOne(Properties::class,'status','id');
    }
    public function reqProperties(){
        return $this->hasOne(RequestProperty::class,'property_id','id');
    }
    public function status(){
        return $this->belongsTo(Properties::class,'status','id');
    }
}
