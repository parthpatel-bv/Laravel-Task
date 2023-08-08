<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_data extends Model
{
    use HasFactory;
    protected $fillable = ['fname', 'lname', 'email', 'state', 'city', 'password']; 

    public function accesstypes(){
        return $this->belongsTo(Accesstype::class);
    }

    public function usertype(){
        return $this->hasOne(Usertype::class);
    }
}
