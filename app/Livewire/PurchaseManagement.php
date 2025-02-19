<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class PurchaseManagement extends Component
{
   use WithPagination;
   
    public $product_id, $supplier_id, $quantity, $price, $purchase_date, $purchaseId;
    public $search;
    public function render()
    {
        return view('livewire.purchase-management',[
            "purchases" => Purchase::latest()->with('supplier' ,'product')
            ->whereHas('product', fn($query) 
            => $query->where('name', 'like', "%{$this->search}%"))
            ->paginate(5),
            'products' => Product::all(),
            'suppliers' => Supplier::all(),
        ]) ;
    }

    public function addPurchase()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'purchase_date' => 'required|date',
        ]);

        Purchase::create([
            'product_id' => $this->product_id,
            'supplier_id' => $this->supplier_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'purchase_date' => $this->purchase_date,
        ]);

 
        $product = Product::find($this->product_id);
        $product->increment('quantity', $this->quantity);
        // $product->update(['price' => $this->price]);

        session()->flash('message', '✅ تم إضافة عملية الشراء بنجاح!');
        $this->resetFields();
    }

    public function deletePurch(Purchase $purchase){
        try{
                $purchase->delete();
            session()->flash('message', '✅ تم حذف عملية الشراء بنجاح!');
        }catch(\Exception $e){
            session()->flash('message', '❌ حدث خطأ أثناء حذف عملية الشراء.');
        }
    
    }
    private function resetFields()
    {
        $this->product_id = $this->supplier_id = $this->quantity = $this->price = $this->purchase_date = null;
        $this->purchaseId = null;
    }
}
