<div>
    <h2>💰 إدارة المبيعات</h2>

    <form wire:submit.prevent="addSale">
        <select wire:model="product_id">
            <option value="">اختر المنتج</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} (المتوفر: {{ $product->quantity }})</option>
            @endforeach
        </select>

        <input type="number" wire:model="quantity" placeholder="الكمية">
        <input type="number" wire:model="price" placeholder="سعر البيع">
        <input type="date" wire:model="sale_date">

        <button type="submit">إضافة</button>
    </form>

    <input type="text" wire:model="search" placeholder="🔍 بحث عن مشتريات">

    @if (session()->has('message'))
        <p>{{ session('message') }}</p>
    @endif

    @if (session()->has('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <table>
        <thead>
            <tr>
                <th>المنتج</th>
                <th>الكمية</th>
                <th>سعر البيع</th>
                <th>تاريخ البيع</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->price}}</td>
                    <td>{{ $sale->sale_date }}</td>
                   
                </tr>

            @endforeach
            
        </tbody>
    </table>
    {{ $sales->links() }}
</div>
