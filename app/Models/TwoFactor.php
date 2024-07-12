<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoFactor extends Model
{
    use HasFactory;

    public function twoFactor()
    {
        return $this->hasOne(TwoFactor::class);
    }

}


