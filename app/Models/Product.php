<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'productname', 'productcode', 'color', 'fabric'
    ];
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
