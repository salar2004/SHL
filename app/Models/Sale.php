<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'total_price',
        'sale_date',
        'goods_id',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
