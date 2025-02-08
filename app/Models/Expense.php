<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'description',
        'date',
        'employee_id',
        'goods_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
