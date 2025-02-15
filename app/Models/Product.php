<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'quantity', 'category','supplier_id'];

    // علاقة المنتج بالمورد
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // علاقة المنتج بالمشتريات
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    // علاقة المنتج بالمبيعات
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
