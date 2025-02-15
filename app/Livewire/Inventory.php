<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Supplier;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;


class Inventory extends Component
{

  use WithPagination;

    public $name, $price, $quantity, $category;
    public $search;
  public $productId;
  public $supplier_id;
 
  public $lowStockWarning = false;
   
    public function render()
    {
        $products = Product::latest()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate(5);
    // التحقق من المنتجات ذات المخزون المنخفض
        $this->checkLowStock($products);
    $suppliers = Supplier::all();
    return view('livewire.inventory', compact('products','suppliers'));
    }

    private function checkLowStock($products)
{
    $this->lowStockWarning = $products->contains(fn($product) => $product->quantity < 5);
}

    public function addProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'category' => 'required|string|max:255',
        ]);
        //  dd('hi');
        //  die();
        if($this->quantity < 5){
            session()->flash('warning', '⚠️ تحذير: الكمية أقل من 5!');
          }
        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category' => $this->category,
            'supplier_id' => $this->supplier_id,
        ]);

        session()->flash('message', '✅ تم إضافة المنتج بنجاح!');

        $this->resetFields();
    }
        public function delete(Product $product){
            try{
                    $product->delete();
                session()->flash('message', '✅ تم حذف المنتج بنجاح!');
            }catch(Exception $e){
                session()->flash('message', '❌ حدث خطأ أثناء حذف المنتج.');
            }
    
        }

        public function edit($id){
            $this->productId = $id ; 
      
            $product = Product::findOrFail($id);
            $this->name = $product->name;
            $this->price = $product->price;
            $this->quantity =$product->quantity;
            $this->category = $product->category;
            $this->supplier_id = $product->supplier_id;
        }

        public function cancel( ){

              $this->reset('productId' , 'name','price','quantity','category');
        }
        public function update( ){
            $product = Product::findOrFail($this->productId);
              
            $this->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:1',
                'quantity' => 'required|integer|min:1',
                'category' => 'required|string|max:255',
            ]);

             $product->update([
            'name' =>$this->name,
            'price' =>$this->price,
            'quantity' =>$this->quantity,
            'category' =>$this->category,
            'supplier_id' => $this->supplier_id,
          ]);
          
          if($this->quantity < 5){
            session()->flash('warning', '⚠️ تحذير: الكمية أقل من 5!');
          }
          $this->cancel();

          session()->flash('message', '✅ تم تعديل المنتج بنجاح!');
      }

    private function resetFields()
    {
        $this->name = $this->price = $this->quantity = $this->category = null;
         
    }
}
