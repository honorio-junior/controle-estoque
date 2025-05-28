<?php

namespace App\Services;

use App\Models\StockModel;
use App\Models\InvoiceModel;
use App\Models\ProductModel;
use PhpParser\Node\Expr\Throw_;

class InventoryService
{
   public function saveInvoice(int $stockId, array $data): int
   {

      $stock = StockModel::find($stockId);

      if ($stock == null) {
         throw new \Exception("stock não encontrado!");
      }

      if (InvoiceModel::where('code', $data['code'])->exists()) {
         throw new \Exception("Nota fiscal já cadastrada!");
      }

      $invoice = InvoiceModel::create([
         'code' => $data['code'],
         'date' => $data['date'],
         'name' => $data['name'],
         'stock_id' => $stock->id,
      ]);

      foreach ($data['products'] as $product) {
         ProductModel::create([
            'name' => $product['name'],
            'price' => $product['price'],
            'code' => $product['code'],
            'amount' => $product['amount'],
            'invoice_id' => $invoice->id
         ]);
      }

      return $invoice->id;
   }
}
