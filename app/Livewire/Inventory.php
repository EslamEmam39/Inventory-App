<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;


class Inventory extends Component
{

  use WithPagination;

    public $name, $price, $quantity, $category ,$priceSale ,$category_id ,$details;
  public $productId;
  public $categories;
  public $supplier_id;
  public $search;
  public $lowStockWarning = false;
   
    public function render()
    {
        $products = Product::latest()
        ->whereHas('supplier', fn($query) => 
        $query->Where('name' , 'like',"%{$this->search}%") )
        ->orWhere('price', 'like', "%{$this->search}%")
        ->orWhere('name', 'like', "%{$this->search}%")
        ->with('supplier' ,'category')
        ->paginate(5);
    $suppliers= Supplier::all();
    $this->categories= Category::all();
        $this->checkLowStock($products);
 
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
            'category_id' => 'required|string|max:255',
            'priceSale' => 'required|string|max:255',
            'supplier_id' => 'required|string|max:255'
           
        ]);
      
        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'supplier_id' => $this->supplier_id,
            'priceSale' => $this->priceSale,
            'category_id' => $this->category_id,
            'details' => $this->details
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
            $product = Product::findOrFail($id);
            $this->productId = $id ; 
            $this->name = $product->name;
            $this->price = $product->price;
            $this->quantity =$product->quantity;
            $this->category = $product->category;
            $this->details = $product->details;
            $this->supplier_id = $product->supplier_id;
            $this->priceSale = $product->priceSale;
            $this->category_id= $product->category_id;
        }

        public function cancel( ){

              $this->reset('productId' , 'name','price','quantity','category','priceSale');
        }
        public function update( ){
            $product = Product::findOrFail($this->productId);
              
            $this->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:1',
                'priceSale' => 'required|numeric|min:1',
                'quantity' => 'required|integer|min:1',
                'category_id' => 'required|string|max:255',
                 
            ]);

             $product->update([
            'name' =>$this->name,
            'price' =>$this->price,
            'quantity' =>$this->quantity,
            'category_id' =>$this->category_id,
            'supplier_id' => $this->supplier_id, 
            'priceSale' => $this->priceSale,
            'details' => $this->details,
            
            
          ]);
          $this->cancel();

          session()->flash('message', '✅ تم تعديل المنتج بنجاح!');
      }

    private function resetFields()
    {
        $this->name = $this->price = $this->quantity  
        = $this->priceSale  = $this->details = $this->category_id= null ;
         
    }
}
