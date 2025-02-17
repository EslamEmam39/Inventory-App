<tr>
    @if ($productId === $product->id)
        <td>
            <input type="text" wire:model="name" class="form-control" placeholder="اسم المنتج">
        </td>
        <td>
            <input type="number" wire:model="price" class="form-control" placeholder="السعر">
        </td>
        <td>
            <input type="number" wire:model="priceSale" class="form-control" placeholder="السعر">
        </td>
        <td>
            <input type="number" wire:model="details" class="form-control" placeholder="لتفاصيل">
        </td>
        <td>
            <select wire:model="category_id" class="form-select" id="productSupplier">
                <option   selected disabled ="" value="">اختر المورد</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" wire:model="quantity" class="form-control" placeholder="الكميه">
        </td>
        <td>
            <select wire:model="supplier_id" class="form-select" id="productSupplier">
                <option   selected disabled ="" value="">اختر المورد</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </td>
         
        <td class="d-flex gap-2">
            <button wire:click='cancel' type="button" class="btn btn-sm btn-outline-danger">
                ❌ إلغاء
            </button>
            <button wire:click='update' type="button" class="btn btn-sm btn-outline-primary">
                🔄 تحديث
            </button>
        </td>
    @else   
        <td class="fw-bold">{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
       
        <td>{{ $product->priceSale}}</td>
 
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->details }}</td>
        <td>{{ $product->supplier->name}}</td>
       
       
        <td class="d-flex gap-2">
            <button wire:click='delete({{ $product->id }})' type="button" class="btn btn-sm btn-outline-danger">
                🗑️ حذف
            </button>
            <button wire:click='edit({{ $product->id }})' type="button" class="btn btn-sm btn-outline-success">
                ✏️ تعديل
            </button>
        </td>
    @endif
</tr>
