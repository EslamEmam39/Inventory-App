<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
     
            <h2 class="mb-4 text-center text-primary fw-bold">📌 إدارة الموردين</h2>

       
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    @include('livewire.inc-supplier.create')
                </div>
            </div>

           
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    @include('livewire.inc-supplier.search')
                </div>
            </div>

       
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>📛 اسم المورد</th>
                                    <th>📞 رقم الهاتف</th>
                                    {{-- <th>📧 البريد الإلكتروني</th> --}}
                                    <th>⚙️ الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                    @include('livewire.inc-supplier.show')
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-danger fw-bold py-4">
                                            🚫 لا توجد بيانات لعرضها
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                     
                    <div class="d-flex justify-content-center mt-3">
                        {{ $suppliers->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
