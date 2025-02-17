<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ✅ {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($lowStockWarning  )
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ⚠️ بعض المنتجات بها مخزون منخفض!
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

         
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-center">📦 إدارة المخزون</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addProduct">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model="name" class="form-control" id="productName"
                                        placeholder="اسم المنتج">
                                    <label for="productName">اسم المنتج</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" wire:model="price" class="form-control" id="productPrice"
                                        placeholder="السعر">
                                    <label for="productPrice">السعر</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" wire:model="priceSale" class="form-control" id="productPrice"
                                        placeholder="السعر">
                                    <label for="productPrice">السعر للبيع</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" wire:model="quantity" class="form-control"
                                        id="productQuantity" placeholder="الكمية">
                                    <label for="productQuantity">الكمية</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <textarea type="text" wire:model="details" class="form-control" id="productPrice"
                                        placeholder="السعر" > </textarea>
                                    <label for="productPrice"> التفاصيل</label>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <select wire:model="category_id" class="form-select" id=" ">
                                        <option disabled selected value="">اختر التصنيف</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>                
                                    <label for="productCategory">التصنيف</label>
                                </div>
                            </div>

                            
                        <div class="form-floating mb-3">
                            <select wire:model="supplier_id" class="form-select" id="productSupplier">
                                <option disabled accesskey="" selected value="">اختر المورد</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id}}">{{ $supplier->name}}</option>
                                @endforeach
                            </select>
                            <label for="productSupplier">المورد</label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <i class="fas fa-plus"></i> إضافة المنتج
                            </button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
