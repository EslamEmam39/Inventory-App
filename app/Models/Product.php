<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price', 
        'quantity',
        'supplier_id' ,
        'priceSale' ,
        'details',
        'category_id'
    ];

 
    public function category()
    {
        return $this->belongsTo(Category::class);   
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

 
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
