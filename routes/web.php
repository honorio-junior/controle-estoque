<?php

use App\Http\Controllers\InventoryController;
use App\Services\StockService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('home');
})->name('home');

Route::prefix('stocks')->group(function () {

   Route::view('/', 'stock.stocks', ['stocks' => StockService::getStocks()])->name('stocks.all');
   Route::view('/new', 'inventory_register.stock')->name('stocks.new');
   Route::post('/new', [InventoryController::class, 'stockNew'])->name('stocks.new');

   Route::get('/{stock_id}/envoice', [InventoryController::class, 'stockView'])->name('stocks.view')->where('stock_id', '[0-9]+');
   Route::get('/invoice/{invoice_id}', [InventoryController::class, 'invoiceView'])->name('stocks.invoice.view')->where('invoice_id', '[0-9]+');
   Route::get('/{stock_id}/invoice/new', function ($stock_id) {
      return view('inventory_register.invoice', ['stock_id' => $stock_id]);
   })->name('stocks.invoice.new')->where('stock_id', '[0-9]+');
   Route::post('/{stock_id}/invoice/new', [InventoryController::class, 'invoiceNew'])->name('stocks.invoice.new')->where('stock_id', '[0-9]+');

});
