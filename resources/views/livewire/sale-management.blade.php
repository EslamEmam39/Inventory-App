<div class="container mt-5">
    <h2 class="text-center mb-4">💰 إدارة المبيعات</h2>

    <div class="card p-4 shadow-sm">
        <form wire:submit.prevent="addSale">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">اختر المنتج</label>
                    <select wire:model="product_id" class="form-control">
                        <option value="">🔽 اختر المنتج</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }} (المتوفر: {{ $product->quantity }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">الكمية</label>
                    <input type="number" wire:model="quantity" class="form-control" placeholder="🔢 أدخل الكمية">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">سعر البيع</label>
                    <input type="number" wire:model="price" class="form-control" placeholder="💰 أدخل السعر">
                </div>

                <div class="col-md-2 mb-3">
                    <label class="form-label fw-bold">📅 تاريخ البيع</label>
                    <input type="date" wire:model="sale_date" class="form-control">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-5 fw-bold">✅ إضافة</button>
            </div>
        </form>
    </div>

    <!-- 🔍 مربع البحث -->
    <div class="mt-4">
        <input type="text" wire:model="search" class="form-control border border-primary" placeholder="🔍 بحث عن مبيعات">
    </div>

    <!-- 🛑 الرسائل -->
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                    <input type="text" wire:model="product_id" class="form-control" placeholder="المنتح">
                </td>
                <td>
                    <input type="number" wire:model="quantity" class="form-control" placeholder=" الكمية">
                </td>
                <td>
                    <input type="numder" wire:model="price" class="form-control" placeholder="سعر البيع">
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
                        <td>{{ number_format($sale->price, 2) }} ج.م</td>
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

    <!-- 🔄 عرض الصفحات -->
    <div class="d-flex justify-content-center">
        {{ $sales->links() }}
    </div>
</div>
