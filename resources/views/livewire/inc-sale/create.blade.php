<div class="container mt-5">
    @if (session()->has('message'))
    <div class="alert alert-success mt-3 fade-in">{{ session('message') }}</div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger mt-3 fade-in">{{ session('error') }}</div>
@endif

    <h2 class="text-center mb-4">💰 إدارة المبيعات</h2>

    <div class="card p-4 shadow-sm">
        <form wire:submit.prevent="addSale">
            <div class="row">
                <div class="col-md-6 mb-3">
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
                    <input type="number" wire:model="price" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">📅 تاريخ البيع</label>
                    <input type="date" wire:model="sale_date" class="form-control">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-5 fw-bold">✅ إضافة</button>
            </div>
        </form>
    </div>
</div>
