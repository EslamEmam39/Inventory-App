<div    >
    <tr>
        @if ($supplierId === $supplier->id)
            <td>
                <input type="text" wire:model="name" placeholder="اسم المنتج">
            </td>
            <td>
                <input type="number" wire:model="phone" placeholder="السعر">
            </td>
            <td>
                <input type="email" wire:model="email" placeholder="الكمية">
            </td>

            <td>
                <button wire:click='resetFields' type="button" class="btn btn-danger">Cancel</button>
                <button wire:click='updateSupplier' type="button" class="btn btn-primary">Update</button>
            </td>
        @else
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->phone }}</td>
            <td>{{ $supplier->email }}</td>
            <td>
                <button wire:click='deleteSupplier({{ $supplier->id }})' type="button" class="btn btn-danger">Delete</button>
                <button wire:click='editSupplier({{ $supplier->id }})' type="button" class="btn btn-success">Edit</button>
            </td>
        @endif
    </tr>
</div>
