<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\properties;
use Laravel\Scout\Searchable;
class houseandlot extends Model
{
    use HasFactory;
    use Searchable;
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
    public function properties(){
        return $this->belongsToMany(properties::class,'property_id','id');
    }
}
