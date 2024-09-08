<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    public static function dataCount()
    {
        return self::where('active',1)->where('user_id',Auth::user()
        ->id)->get()->toArray();
    }
}
