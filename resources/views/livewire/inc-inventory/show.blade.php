<tr>
    @if ($productId === $product->id)
        <td>
            <input type="text" wire:model="name" class="form-control" placeholder="اسم المنتج">
        </td>
        <td>
            <input type="number" wire:model="price" class="form-control" placeholder="السعر">
        </td>
        <td>
            <input type="number" wire:model="quantity" class="form-control" placeholder="الكميه">
        </td>
        <td>
            <input type="text" wire:model="category" class="form-control" placeholder="التصنيف">
        </td>
        <td>
            <select wire:model="supplier_id" class="form-select" id="productSupplier">
                <option value="">اختر المورد</option>
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
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->category }}</td>
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
