{{--  
<div class="dashboard">
    <nav>
        <ul>
            <li><a href="{{ route('suppliers') }}">🏢 إدارة الموردين</a></li>
            <li><a href="{{ route('purchases') }}">🛒 إدارة المشتريات</a></li>
            <li><a href="{{ route('sales') }}">💰 إدارة المبيعات</a></li>
            <li><a href="{{ route('inventory') }}">📦 إدارة المخزون</a></li>
        </ul>
    </nav>
    <h2>📊 لوحة التحكم</h2>

    <div class="stats">
        <div class="card">
            <h3>📦 عدد المنتجات</h3>
            <p>{{ \App\Models\Product::count() }}</p>
        </div>

        <div class="card">
            <h3>🏢 عدد الموردين</h3>
            <p>{{ \App\Models\Supplier::count() }}</p>
        </div>

        <div class="card">
            <h3>💰 إجمالي المبيعات</h3>
            <p>{{ \App\Models\Sale::sum('price') }} جنيه</p>
        </div>

        <div class="card">
            <h3>🚨 المنتجات منخفضة المخزون</h3>
            <ul>
                @foreach (\App\Models\Product::where('quantity', '<', 5)->get() as $product)
                    <li>{{ $product->name }} ({{ $product->quantity }})</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
 
  --}}