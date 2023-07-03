<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WireTable extends Model
{
    use HasFactory;

    public function rUser()
    {
        # code...
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rpin()
    {
        return $this->hasMany(OTP::class);
    }
}
