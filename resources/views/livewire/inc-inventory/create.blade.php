<div wire:key>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if ($lowStockWarning)
    <div class="alert alert-warning">
        ⚠️ بعض المنتجات بها مخزون منخفض!
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h2>📦 إدارة المخزون</h2>
    <form wire:submit.prevent="addProduct">
        <input type="text" wire:model="name" placeholder="اسم المنتج">
        <input type="number" wire:model="price" placeholder="السعر">
        <input type="number" wire:model="quantity" placeholder="الكمية">
        <input type="text" wire:model="category" placeholder="التصنيف">
        <select wire:model="supplier_id">
            <option value="">اختر المورد</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
        <button type="submit"> Add </button>
       
    </form>
 

</div>
