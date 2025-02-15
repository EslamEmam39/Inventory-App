<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email'];

    // علاقة المورد بالمنتجات
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // علاقة المورد بالمشتريات
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
