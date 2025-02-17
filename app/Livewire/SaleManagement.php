<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class SaleManagement extends Component
{ 
 use WithPagination ;
 
    public $product_id, $quantity, $price, $sale_date;
    public $search;

    public $saleID;
    public function render()
    { 
        return view('livewire.sale-management', [
            'sales' => Sale::latest()->with('product')
                ->whereHas('product', fn($query) => 
                    $query->where('name', 'like', "%{$this->search}%")
                )
                ->paginate(5),
            'products' => Product::all(),
        ]);
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


       
        $product->decrement('quantity', $this->quantity);

        session()->flash('message', '✅ تم إضافة عملية البيع بنجاح!');
        $this->resetFields();
    }
    public function updatedProductId($value): void
    {
        // dd($value); 
        if ($value) {
            $product = Product::find( $value);
            $this->price = $product ? $product->priceSale : null;
      
            // dd($this->price);
        }

    }
    public function editSale($id){
        $sale = Sale::findOrFail($id);
        $this->saleID = $id ;
        $this->product_id = $sale->product->id ;
        $this->quantity = $sale->quantity ;
        $this->price = $sale->price ;
        $this->sale_date = $sale->sale_date;
    }
 

    public function updateSale(){
        $sale = Sale::findOrFail($this->saleID);
              
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'sale_date' => 'required|date',
        ]);
        $oldQuantity = $sale->quantity;
        $product = Product::findOrFail($this->product_id);

        if ($this->quantity > ($product->quantity + $oldQuantity)) {
            session()->flash('error', '❌ الكمية المطلوبة غير متاحة في المخزون!');
            return;
        }
        $product->increment('quantity', $oldQuantity);


    $sale->update([
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sale_date' => $this->sale_date,
        ]);
        
        $product->decrement('quantity', $this->quantity);
      
   
      $this->resetFields();

      session()->flash('message', '✅ تم تعديل المنتج بنجاح!');
  }

  public function deleteSale(Sale $sale){
    try {
         $product = Product::find($sale->product_id);
        if ($product) {
            $product->increment('quantity', $sale->quantity);
        }

        $sale->delete();
        session()->flash('message', '✅ تم حذف عملية البيع بنجاح!');
    } catch (\Exception $e) {
        session()->flash('message', '❌ حدث خطأ أثناء حذف عملية البيع.');
    }
    }

      public function resetFields()
    {
        $this->product_id = $this->quantity = $this->price = $this->sale_date = null;
        $this->saleID = null;
    }
}
