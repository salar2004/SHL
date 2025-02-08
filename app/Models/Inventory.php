<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'stock_level',
        'last_updated',
        'goods_id',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
