<div>
    <div class="container mt-4">
      <div class="row justify-content-center">
          <div class="col-md-8">
              
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
    
            
              <div class="card shadow-lg">
                  <div class="card-header bg-primary text-white">
                      <h5 class="mb-0 text-center">إضافة تصنيف جديد</h5>
                  </div>

                  <div class="card-body ">
                      <form wire:submit.prevent="addCategory">
                          <div class="row justify-content-center">
                              <div class="col-md-6 mb-3  ">
                                  <div class="form-floating w-10 ">
                                      <input type="text" wire:model="name" class="form-control" id="supplierName" placeholder="اسم التصنيف">
                                      <label for="supplierName">اسم التصنيف</label>
                                  </div>
                              </div>
                          </div>
   
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-lg px-4">
                                  <i class="fas fa-plus"></i> إضافة التصنيف
                              </button>
                          </div>

                      </form>
                  </div>

              </div>    

          </div>
      </div>
    </div> 
  
</div>
