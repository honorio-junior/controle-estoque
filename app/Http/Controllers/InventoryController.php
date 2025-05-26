<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockModel;
use App\Models\InvoiceModel;

class InventoryController extends Controller
{

   public function stockNew(Request $request)
   {
      $request->validate([
         'name' => 'nullable|string',
         'date' => 'required|date|unique:stocks,date',
      ]);

      $stock = new StockModel();
      $stock->name = $request->name ?? null;
      $stock->date = $request->date;
      $stock->save();

      return redirect()->route('stocks.view', $stock->id);

   }


   public function invoiceNew(Request $request, int $stock_id)
   {
      $validated = $request->validate([
         'name' => 'required|string|max:255',
         'date' => 'required|date',
      ]);

      $invoice = InvoiceModel::create([
         'name' => $validated['name'],
         'date' => $validated['date'],
         'stock_id' => $stock_id,
      ]);

      return redirect()->route('stocks.invoice.view', $invoice->id);

   }


   public function stockView(int $stock_id)
   {
      $stock = StockModel::find($stock_id);
      if ($stock == null) {
         return redirect()->route('stocks.all');
      }

      return view('stock.stock', ['stock' => $stock]);
   }

   public function invoiceView(int $invoice_id)
   {
      $invoice = InvoiceModel::find($invoice_id);
      if ($invoice == null) {
         return redirect()->back();
      }

      return view('invoice.invoice', ['invoice' => $invoice]);
   }
   
}
