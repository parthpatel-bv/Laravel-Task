<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;
    protected $fillable = ['standard']; 

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subTostd');
    }
    public function students()
    {
        return $this->belongsToMany(User_data::class, 'stdtostu');
    }
}
