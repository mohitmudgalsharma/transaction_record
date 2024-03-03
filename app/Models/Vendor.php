<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
    ];
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'vendor_name', 'name');
    }
}
