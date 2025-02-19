
<!-- 📜 جدول عرض المبيعات -->
<div class="table-responsive mt-4">
    <table class="table table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>📦 المنتج</th>
                <th>🔢 الكمية</th>
                <th>💰 سعر البيع</th>
                <th>📅 تاريخ البيع</th>
                <th>⚙️ التحكم</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sales as $sale)
                <tr>
                    @if ($saleID === $sale->id)
                        <td>
                            <select wire:model="product_id" class="form-control">
                                <option readonly disabled value="">🔽 اختر المنتج</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} (المتوفر: {{ $product->quantity }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" wire:model="quantity" class="form-control" placeholder=" الكمية">
                        </td>
                        <td>
                            <input type="number" wire:model="price" class="form-control" placeholder="سعر البيع">
                        </td>
                        <td>
                            <input type="date" wire:model="sale_date" class="form-control" placeholder="تاريخ البيع">
                        </td>
                        <td>
                            <button wire:click='resetFields' type="button" class="btn btn-sm btn-danger">إلغاء</button>
                            <button wire:click='updateSale' type="button" class="btn btn-sm btn-primary">تحديث</button>
                        </td>
                    @else
                        <td class="fw-bold">{{ $sale->product->name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ ($sale->price * $sale->quantity ) }} ج.م</td>
                        <td>{{ $sale->sale_date }}</td>
                        <td>
                            <button wire:click="editSale({{ $sale->id }})" class="btn btn-warning btn-sm">✏️ تعديل</button>
                            <button wire:click="deleteSale({{ $sale->id }})" class="btn btn-danger btn-sm">🗑️ حذف</button>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-danger fw-bold">🚫 لا توجد مبيعات لعرضها</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
