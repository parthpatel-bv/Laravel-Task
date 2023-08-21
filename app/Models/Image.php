<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path','users_id'];

    public function userdata(){
        return $this->belongsTo(Userdata::class);
    }
}
