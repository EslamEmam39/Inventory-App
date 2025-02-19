<div>
          <tr>
                @if ($supplierId === $supplier->id)
                    <td>
                        <input type="text" wire:model="name" class="form-control" placeholder="اسم المورد">
                    </td>
                    <td>
                        <input type="text" wire:model="phone" class="form-control" placeholder="رقم الهاتف">
                    </td>          
                    <td>
                        <button wire:click='resetFields' type="button" class="btn btn-sm btn-danger">إلغاء</button>
                        <button wire:click='updateSupplier' type="button" class="btn btn-sm btn-primary">تحديث</button>
                    </td>
                @else
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->phone }}</td>
                 
                    <td>
                        <button wire:click='deleteSupplier({{ $supplier->id }})' type="button" class="btn btn-sm btn-danger">حذف</button>
                        <button wire:click='editSupplier({{ $supplier->id }})' type="button" class="btn btn-sm btn-success">تعديل</button>
                    </td>
                @endif
            </tr>
</div>
      
      
 