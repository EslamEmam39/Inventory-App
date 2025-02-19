<?php

namespace App\Livewire;
use Exception ;
use App\Models\Category;
use Livewire\Component;

class CategoryManagement extends Component
{
    public $name ,$categoryId ; 

    public $search;
    public $categories ; 
    public function render()
    {

        $this->categories = Category::all();

        return view('livewire.category-management');
    }

    public function addCategory(){

        $this->validate([
            'name' => 'required|string|max:255',
           
        ]);

        Category::create([
            'name' => $this->name
        ]);

        session()->flash('message' , 'تم اضافه المنتج بنجاح');

        $this->resetFields();

    }

    public function editCategory($id){
        $category = Category::find($id);
        $this->categoryId = $id ;
        $this->name = $category->name ; 
    }

    public function cancel( ){

        $this->reset('categoryId' , 'name' );
  }

  public function updateCategory(){
    $category = Category::find($this->categoryId);

    $this->validate([
        'name' => 'required|string|max:255',
       
    ]);
   
    $category->update([
        'name'=> $this->name
    ]);

    session()->flash('message' , 'تم تعديل الصنف بنجاح');

    $this->resetFields();


  }

//   public function getCategoryProducts($id){
//     $categories = Category::findOrFail($id)->products;
    
//   }

  public function deleteCategory(Category $category){
     try{
        $category->delete();
        session()->flash('message' , 'تم حذف الصنف بنجاح');
     }catch(Exception $e){
        session()->flash('message', '❌ حدث خطأ أثناء حذف المورد.');
     }
  }

    private function resetFields(){
        $this->name = null ;
        $this->categoryId = null;
    }
}
