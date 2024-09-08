<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\hasOne;

use App\Models\Product;
use App\Models\Item;
use App\Models\Itemcarat;

class Purchase extends Model
{
    use HasFactory;
    public static function dataCount()
    {
        return self::where('active',1)->where('user_id',Auth::user()
        ->id)->get()->toArray();
    }

    public function productdetail() : HasOne
    {
        return $this->hasOne(Product::class,'id','prod_id');
    }

    public function purchesitem() : HasOne
    {
        return $this->hasOne(Item::class,'id','item');
    }

    public function purchescarat() : HasOne
    {
        return $this->hasOne(Itemcarat::class,'id','carat');
    }
}
