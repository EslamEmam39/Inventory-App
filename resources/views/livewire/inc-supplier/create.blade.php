<div  >
     @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
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



 

 
<form wire:submit.prevent="addSupplier">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row">
      <div class="col-12 col-md-6 mb-4">
        <div class="form-outline">
          <input type="text" wire:model="name" id="form6Example1" class="form-control" />
          <label class="form-label"   for="form6Example1">
            Supplier name</label>
        </div>
      </div>

      <div class="col-12 col-md-6 mb-4">
        <div class="form-outline">
          <input type="text"   wire:model="phone" id="form6Example2" class="form-control" />
          <label class="form-label"   for="form6Example2">Phone</label>
        </div>
      </div>
    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
      <input type="email"  wire:model="email" id="form6Example3" class="form-control" />
      <label class="form-label"   for="form6Example3">E-mail</label>
    </div>
    <div class="form-outline mb-4">
        <button type="submit" class="btn btn-secondary btn-rounded btn-block">Add Supplier</button>

         
      </div>

   </form>
</div>
