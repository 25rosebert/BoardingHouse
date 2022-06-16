<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class category extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image'
    ];
    public function properties(){
        return $this->hasMany(Properties::class,'property_id','id');
    }
}
