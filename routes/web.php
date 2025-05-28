<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('home');
})->name('home');

Route::prefix('stocks')->group(function () {

   Route::get('/', [InventoryController::class, 'stocks'])->name('stocks.all');
   Route::view('/new', 'inventory_register.stock')->name('stocks.new');
   Route::post('/new', [InventoryController::class, 'stockNew'])->name('stocks.new');
   Route::get('/{stock_id}/envoice', [InventoryController::class, 'stockView'])->name('stocks.view')->where('stock_id', '[0-9]+');
   Route::get('/invoice/{invoice_id}', [InventoryController::class, 'invoiceView'])->name('stocks.invoice.view')->where('invoice_id', '[0-9]+');

});
