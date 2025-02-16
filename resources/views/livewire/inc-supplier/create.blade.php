 <div>
  <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- تنبيهات -->
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
  
            <!-- كارد النموذج -->
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-center">إضافة مورد جديد</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="addSupplier">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model="name" class="form-control" id="supplierName" placeholder="اسم المورد">
                                    <label for="supplierName">اسم المورد</label>
                                </div>
                            </div>
  
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model="phone" class="form-control" id="phoneNumber" placeholder="رقم الهاتف">
                                    <label for="phoneNumber">رقم الهاتف</label>
                                </div>
                            </div>
                        </div>
  
                        <div class="form-floating mb-3">
                            <input type="email" wire:model="email" class="form-control" id="emailAddress" placeholder="البريد الإلكتروني">
                            <label for="emailAddress">البريد الإلكتروني</label>
                        </div>
  
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <i class="fas fa-plus"></i> إضافة المورد
                            </button>
                        </div>
                    </form>
                </div>
            </div> <!-- نهاية كارد النموذج -->
        </div>
    </div>
  </div>
 </div>
