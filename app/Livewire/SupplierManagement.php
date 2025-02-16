<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Supplier;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierManagement extends Component
{
    use WithPagination;
     
    public $name, $phone, $email, $supplierId;

    public $search;

 

    public function render()
    {

      $suppliers = Supplier::latest()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate(5);
        return view('livewire.supplier-management', compact('suppliers')) ;
    }


    public function addSupplier()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
// dd('hi');
// die();
        Supplier::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        session()->flash('message', '✅ تم إضافة المورد بنجاح!');

        $this->resetFields();
    }

    public function editSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        $this->supplierId = $id;
        $this->name = $supplier->name;
        $this->phone = $supplier->phone;
        $this->email = $supplier->email;
    }
    public function updateSupplier()
    {
        $supplier = Supplier::findOrFail($this->supplierId);

        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $supplier->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        session()->flash('message', '✅ تم تحديث المورد بنجاح!');
        $this->resetFields();
    }
    public function deleteSupplier(Supplier $supplier){
        try{
                $supplier->delete();
            session()->flash('message', '✅ تم حذف المنتج بنجاح!');
        }catch(Exception $e){
            session()->flash('message', '❌ حدث خطأ أثناء حذف المنتج.');
        }

    }

    public function resetFields()
    {
        $this->name = $this->phone = $this->email = null;
        $this->supplierId = null;
    }

}
