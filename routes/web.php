<?php

use App\Livewire\Dashboard;
use App\Livewire\Inventory;
use App\Livewire\PurchaseManagement;
use App\Livewire\SaleManagement;
use App\Livewire\SupplierManagement;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/inventory', Inventory::class)->name('inventory');
Route::get('/suppliers', SupplierManagement::class)->name('suppliers');
Route::get('/purchases', PurchaseManagement::class)->name('purchases');
Route::get('/sales', SaleManagement::class)->name('sales');
