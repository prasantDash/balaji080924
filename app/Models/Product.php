<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['proname'];

    public static function dataCount()
    {
        return self::where('active',1)->where('user_id',Auth::user()
        ->id)->get()->toArray();
    }
}
