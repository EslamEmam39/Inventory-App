<div>
    <h2>إدارة المشتريات</h2>

    <form wire:submit.prevent="addPurchase">
        <select wire:model="product_id">
            <option value="">اختر المنتج</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>

        <select wire:model="supplier_id">
            <option value="">اختر المورد</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>

        <input type="number" wire:model="quantity" placeholder="الكمية">
        <input type="number" wire:model="price" placeholder="السعر">
        <input type="date" wire:model="purchase_date">

        <button type="submit">إضافة</button>
    </form>

    <input type="text" wire:model="search" placeholder="🔍 بحث عن مشتريات">

    <table>
        <thead>
            <tr>
                <th>المنتج</th>
                <th>المورد</th>
                <th>الكمية</th>
                <th>السعر</th>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->supplier->name }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->price }}</td>
                    <td>{{ $purchase->purchase_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $purchases->links() }}
</div>
