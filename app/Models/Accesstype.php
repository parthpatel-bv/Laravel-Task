<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesstype extends Model
{
    use HasFactory;
    
    public function Userdata(){
        return $this->hasMany(Userdata::class);
    }
}
