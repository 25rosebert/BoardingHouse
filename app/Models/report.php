<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id','name','report_type','description','offense_count'
    ];

    public function properties(){
        return $this->belongsTo(Properties::class,'property_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
