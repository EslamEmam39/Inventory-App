<div class="container mt-4">
  <!-- نموذج إضافة منتج -->
  @include('livewire.inc-inventory.create')

  <!-- نموذج البحث -->
  @include('livewire.inc-inventory.search')

  <h3 class="mt-4">📜 قائمة المنتجات</h3>

  <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered text-center align-middle">
          <thead class="table-dark">
              <tr>
                  <th>اسم المنتج</th>
                  <th>السعر</th>
                  <th>الكمية</th>
                  <th>التصنيف</th>
                  <th>المورد</th>
                  <th>الإجراءات</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($products as $product)
                  @include('livewire.inc-inventory.show')
              @empty
                  <tr>
                      <td colspan="6" class="text-danger fw-bold">🚫 لا توجد منتجات لعرضها</td>
                  </tr>
              @endforelse
          </tbody>
      </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center mt-3">
      {{ $products->links('pagination::bootstrap-5') }}
  </div>
</div>
