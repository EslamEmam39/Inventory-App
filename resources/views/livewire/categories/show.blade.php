<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>اسم الصنف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category )
            <tr>
                @if ($categoryId === $category->id)
                <td>
                    <input type="text" wire:model="name" class="form-control" placeholder="اسم المورد">
                </td>
                        
                <td>
                    <button wire:click='cancel' type="button" class="btn btn-sm btn-danger">إلغاء</button>
                    <button wire:click='updateCategory' type="button" class="btn btn-sm btn-primary">تحديث</button>
                </td>
               @else
                <td>{{ $category->name }}</td>
                <td>
                    <button wire:click='deleteCategory({{ $category->id }})' type="button" class="btn btn-sm btn-danger">حذف</button>
                    <button wire:click='editCategory({{ $category->id }})' type="button" class="btn btn-sm btn-success">تعديل</button>
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


