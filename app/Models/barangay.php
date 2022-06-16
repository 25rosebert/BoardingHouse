<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay'
    ];
    public function properties(){
        return $this->hasOne(properties::class,'barangay_id','id');
    }
    public function reqProperties(){
        return $this->hasOne(RequestProperties::class,'barangay_id','id');
    }
}
