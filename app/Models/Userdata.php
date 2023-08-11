<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Userdata extends Authenticatable
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
