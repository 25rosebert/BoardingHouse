<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class locations extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'property_id',
        'address',
        'latitude',
        'longitude',
        'landmarks'  
    ];
    public function properties(){
        return $this->belongsTo(properties::class,'properties_id','id');
    }
}
