<div>


    <div>
        <div class="mask d-flex align-items-center h-100 mb-5 mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="card-body p-5">

                                <h1 class="mb-5 text-center">Add Supplier management</h1>
                                @include('livewire.inc-supplier.search')
                                @include('livewire.inc-supplier.create')
                                @include('livewire.inc-supplier.search')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <table class="table table-bordered table-striped table-hover">

            <tr>
                <th>الاسم</th>
                <th>الهاتف</th>
                <th>البريد الإلكتروني</th>
                <th>الإجراءات</th>
            </tr>

            @forelse ($suppliers as $supplier)
                @include('livewire.inc-supplier.show')
            @empty
                <tr>
                    <td colspan="4">🚫 لا توجد منتجات لعرضها</td>
                </tr>
            @endforelse
        </table>

        {{ $suppliers->links() }}
    </div>
