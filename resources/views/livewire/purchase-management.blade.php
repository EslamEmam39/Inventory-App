<div class="container mt-4">
    <h2 class="text-center mb-4">🛒 إدارة المشتريات</h2>
    
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif  
 
    <form wire:submit.prevent="addPurchase" class="p-4 border rounded shadow-sm bg-light">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">📦 اختر المنتج</label>
                <select wire:model="product_id" class="form-control">
                    <option value="">اختر المنتج</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">🏢 اختر المورد</label>
                <select wire:model="supplier_id" class="form-control">
                    <option value="">اختر المورد</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">🔢 الكمية</label>
                <input type="number" wire:model="quantity" class="form-control" placeholder="الكمية">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">💰 السعر</label>
                <input type="number" wire:model="price" class="form-control" placeholder="السعر">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">📅 تاريخ الشراء</label>
                <input type="date" wire:model="purchase_date" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">➕ إضافة المشتريات</button>
    </form>

  
    <h2 class="text-left mb-4">🛒 عرض المشتريات</h2>
    <!-- 🔍 حقل البحث -->
    <div class="mt-4">
        <input type="text" wire:model.live="search" class="form-control border-success rounded shadow-sm" 
            placeholder="🔍 بحث عن مشتريات...">
    </div>

    <!-- 📜 جدول عرض المشتريات -->
  
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>📦 المنتج</th>
                    <th>🏢 المورد</th>
                    <th>🔢 الكمية</th>
                    <th>💰 السعر</th>
                    <th>📅 التاريخ</th>
                    <th>⚙️ التحكم</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->product->name }}</td>
                        <td>{{ $purchase->supplier->name }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->price }} جنيه</td>
                        <td>{{ $purchase->purchase_date }}</td>
                        <td>
                            <button wire:click="deletePurch({{ $purchase->id }})" class="btn btn-danger btn-sm">🗑️ حذف</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">🚫 لا توجد مشتريات لعرضها</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- 🔄 الترقيم -->
    <div class="mt-3">
        {{ $purchases->links() }}
    </div>
</div>
