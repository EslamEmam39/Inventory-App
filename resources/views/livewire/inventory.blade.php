<div>
    
    @include('livewire.inc-inventory.create')
 
    @include( 'livewire.inc-inventory.search')
    <h3>📜 قائمة المنتجات</h3>
   
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>الاسم</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>التصنيف</th>
             
            <th>المورد</th>
            <th>الإجراءات</th>
       
          
        </tr>
        @forelse ($products as $product)
           @include( 'livewire.inc-inventory.show')
           @empty
           <tr>
               <td colspan="4">🚫 لا توجد منتجات لعرضها</td>
           </tr>
       @endforelse

    </table>
 
    
    
           <!-- Pagination -->
 
 {{$products->links()}}


    
  
  

              <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-12 col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form6Example1" class="form-control" />
                      <label class="form-label" for="form6Example1">First name</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form6Example2" class="form-control" />
                      <label class="form-label" for="form6Example2">Last name</label>
                    </div>
                  </div>
                </div>

                <!-- Text input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form6Example3" class="form-control" />
                  <label class="form-label" for="form6Example3">Company name</label>
                </div>

                <!-- Text input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form6Example4" class="form-control" />
                  <label class="form-label" for="form6Example4">Address</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form6Example5" class="form-control" />
                  <label class="form-label" for="form6Example5">Email</label>
                </div>

                <!-- Number input -->
                <div class="form-outline mb-4">
                  <input type="number" id="form6Example6" class="form-control" />
                  <label class="form-label" for="form6Example6">Phone</label>
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                  <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                  <label class="form-label" for="form6Example7">Additional information</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value=""
                    id="form6Example8"
                    checked
                  />
                  <label class="form-check-label" for="form6Example8"> Create an account? </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-secondary btn-rounded btn-block">Place order</button>
              </form>

     


    

 
    

</div>

