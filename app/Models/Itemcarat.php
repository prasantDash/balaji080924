<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;

class Itemcarat extends Model
{
    use HasFactory;
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public static function dataCount()
    {
        return self::where('active',1)->where('user_id',Auth::user()
        ->id)->get()->toArray();
    }
}
