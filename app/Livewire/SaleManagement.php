<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class SaleManagement extends Component
{ 
 use WithPagination ;
 
    public $product_id, $quantity, $price, $sale_date, $saleId;
    public $search;
     public function render()
    {
        return view('livewire.sale-management' ,[
            'sales' => Sale::with('product')
            ->whereHas( 'product',fn($query) => 
            $query->where('name' , 'like', "%{$this->search}%"))
            ->paginate(5),
            'products' => Product::all(),
        ]) ;
      
    }

    public function addSale()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'sale_date' => 'required|date',
        ]);

        $product = Product::findOrFail($this->product_id);

        if ($this->quantity > $product->quantity) {
            session()->flash('error', '❌ الكمية المطلوبة غير متاحة في المخزون!');
            return;
        }

        Sale::create([
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sale_date' => $this->sale_date,
        ]);

        // تحديث المخزون
        $product->decrement('quantity', $this->quantity);

        session()->flash('message', '✅ تم إضافة عملية البيع بنجاح!');
        $this->resetFields();
    }

      public function resetFields()
    {
        $this->product_id = $this->quantity = $this->price = $this->sale_date = null;
        $this->saleId = null;
    }
}
