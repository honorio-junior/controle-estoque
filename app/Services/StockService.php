<?php

namespace App\Services;
use App\Models\StockModel;

class StockService
{
   static function getStocks(): array
   {
      $data = [];
      $stocks = StockModel::all();

      foreach ($stocks as $stock) {
         $invoices = [];

         foreach ($stock->invoices as $invoice) {
            $price = 0;
            foreach ($invoice->products as $product) {
               $price += (float) (($product->price * $product->amount) / 100);
            }

            $invoices[] = [
               'name' => $invoice->name,
               'date' => $invoice->date,
               'price' => $price
            ];
         }

         $data[] = [
            'id' => $stock->id,
            'name' => $stock->name,
            'date' => $stock->date,
            'invoices' => $invoices
         ];
      }

      return $data;
   }
}
