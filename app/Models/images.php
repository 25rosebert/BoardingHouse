<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class images extends Model
{
    use HasFactory;
    // use Searchable;
    protected $fillable = [
        'property_id',
        'images'
    ];
    public function properties(){
        return $this->belongsTo(Properties::class,'properties_id','id');
    } 
}