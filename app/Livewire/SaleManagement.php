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


    public function editSale($id){
        $sale = Sale::findOrFail($id);
        $this->saleID = $id ;
        $this->product_id = $sale->product->name ;
        $this->quantity = $sale->quantity ;
        $this->price = $sale->price ;
        $this->sale_date = $sale->sale_date;
    }

    public function updateSale(){
        $sale = Product::findOrFail($this->saleID);
              
        $this->validate([
            'product_id' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
        ]);

         $sale->update([
        'product_id' =>$this->product_id,
        'price' =>$this->price,
        'quantity' =>$this->quantity,
        'sale_date' =>$this->sale_date,
    
      ]);
      
   
      $this->resetFields();

      session()->flash('message', '✅ تم تعديل المنتج بنجاح!');
  }

  public function deleteSale(Sale $sale){
    try{
            $sale->delete();
        session()->flash('message', '✅ تم حذف المنتج بنجاح!');
    }catch(\Exception $e){
        session()->flash('message', '❌ حدث خطأ أثناء حذف المنتج.');
    }

}

      public function resetFields()
    {
        $this->product_id = $this->quantity = $this->price = $this->sale_date = null;
        $this->saleID = null;
    }
}
