<div wire:key="{{ $product->id }}">
    <tr>
        @if ($productId === $product->id)
            <td>
                <input type="text" wire:model="name" placeholder="اسم المنتج">
            </td>
            <td>
                <input type="number" wire:model="price" placeholder="السعر">
            </td>
            <td>
                <input type="number" wire:model="quantity" placeholder="الكمية">
            </td>
            <td>
                <input type="text" wire:model="category" placeholder="التصنيف">
            </td>
            <td>
                <button wire:click='cancel' type="button" class="btn btn-danger">Cancel</button>
                <button wire:click='update' type="button" class="btn btn-primary">Update</button>
            </td>
        @else
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->supplier ? $product->supplier->name : 'غير محدد' }}</td>
            <td>
                <button wire:click='delete({{ $product->id }})' type="button" class="btn btn-danger">Delete</button>
                <button wire:click='edit({{ $product->id  }})' type="button" class="btn btn-success">Edit</button>
            </td>
        @endif
    </tr>

</div>
