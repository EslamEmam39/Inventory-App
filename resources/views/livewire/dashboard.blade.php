<div >
 
    <div class="container mt-5">
      <h2 class="mb-4">📊 Dashboard</h2>
      <div class="row">
          <div class="col-md-3">
              <div class="card text-center shadow-sm">
                  <div class="card-body">
                      <h5 class="card-title">🛒 المنتجات</h5>
                      <h3 class="text-primary">{{ \App\Models\Product::count() }}</h3>
                  </div>
              </div>
          </div>
  
          <div class="col-md-3">
              <div class="card text-center shadow-sm">
                  <div class="card-body">
                      <h5 class="card-title">🏭 الموردين</h5>
                      <h3 class="text-success">{{ \App\Models\Supplier::count() }}</h3>
                  </div>
              </div>
          </div>
  
          <div class="col-md-3">
              <div class="card text-center shadow-sm">
                  <div class="card-body">
                      <h5 class="card-title">💰 إجمالي المبيعات</h5>
                      <h3 class="text-danger">{{ number_format(\App\Models\Sale::sum('price')) }} جنيه</h3>
                  </div>
              </div>
          </div>
  
          <div class="col-md-3">
              <div class="card text-center shadow-sm">
                  <div class="card-body">
                      <h5 class="card-title">📦 إجمالي المشتريات</h5>
                      <h3 class="text-warning">{{ number_format(\App\Models\Purchase::sum('price')) }} جنيه</h3>
                  </div>
              </div>
          </div>
      </div>
  
 
      <div class="row mt-4">
          <div class="col-md-6 mx-auto">
              <div class="card shadow-sm">
                  <div class="card-body">
                      <h5 class="card-title text-danger">🚨 المنتجات منخفضة المخزون</h5>
                      <ul class="list-group">
                          @foreach (\App\Models\Product::where('quantity', '<', 5)->get() as $product)
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                  {{ $product->name }}
                                  <span class="badge bg-danger">{{ $product->quantity }}</span>
                              </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>