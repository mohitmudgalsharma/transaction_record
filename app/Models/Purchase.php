<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'date_of_purchase', 'purchased_qty', 'rate_per_meter', 'total_cost', 'vendor_name'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
