<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifiedUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'age',
        'status',
        'birthdate',
        'id_type',
        'frontOfID',
        'backOfID',
        'brgy_clearance'
    ];
    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }
}
