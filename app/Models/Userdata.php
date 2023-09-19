<?php

namespace App\Models;

use ESolution\DBEncryption\Traits\EncryptedAttribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Userdata extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    use HasFactory;

    use EncryptedAttribute;

    protected $fillable = ['fname', 'lname', 'email', 'email_verified_at', 'state', 'city', 'password'];

    protected $encryptable = ['fname', 'lname'];
    public function accesstypes()
    {
        return $this->belongsTo(Accesstype::class);
    }

    public function usertype()
    {
        return $this->hasOne(Usertype::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
