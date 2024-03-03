<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        // 'vendor',
        'total_qty',
        'qty_sold',
        'selling_price',
        'date_sold',
        'sold_to'
    ];

    protected $dates = ['date_sold'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
