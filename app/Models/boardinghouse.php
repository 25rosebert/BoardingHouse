<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class boardinghouse extends Model
{
    use HasFactory;
    // use Searchable;
    protected $fillable = [
        'property_id',
        'bed',
        'rooms',
        'livingroom',
        'comfortroom',
        'kitchen',
        'floor_total',
        'floor_area'
    ];
    public function properties(){
        return $this->belongsTo(properties::class,'property_id','id');
    }
    public function searchableAs()
    {
        return 'properties';
    }
}
