<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RequestHouse extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'property_id',
        'livingroom',
        'bedroom',
        'comfortroom',
        'kitchen',
        'floor_total',
        'land_size',
        'parking_lot',
        'floor_area'
    ];
    protected $dates = ['deleted_at'];

    public function reqProperties(){
        return $this->belongsTo(RequestProperty::class,'property_id','id');
    }
}
