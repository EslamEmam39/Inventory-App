<div>
    <h3 class="mt-4">📜 قائمة المنتجات</h3>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>اسم المنتج</th>
                    <th>السعر</th>
                    <th>السعر للبيع</th>
                    <th>الكمية</th>
                    <th>التفاصيل</th>
                    <th>التصنيف</th>
                    <th>المورد</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
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
                        <input type="number" wire:model="quantity" class="form-control" placeholder="الكميه">
                    </td>
                    <td>
                        <input type="text" wire:model="details" class="form-control" placeholder="لتفاصيل">
                    </td>   
                    <td>
                        <select wire:model="category_id" class="form-select" id="productSupplier">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select wire:model="supplier_id" class="form-select" id="productSupplier">
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
                    <td>{{ $product->details }}</td>
                    <td>{{ $product->category->name }}</td>
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
        
            @empty
            <tr>
                <td colspan="6" class="text-danger fw-bold">🚫 لا توجد منتجات لعرضها</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>

<div class="d-flex justify-content-center mt-3">
{{ $products->links('pagination::bootstrap-5') }}
</div>
</div>


 
