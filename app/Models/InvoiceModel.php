<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
   protected $table = 'invoices';
   protected $fillable = ['name', 'date', 'stock_id'];

   public function stock()
   {
      return $this->belongsTo(StockModel::class, 'stock_id');
   }

   public function products()
   {
      return $this->hasMany(ProductModel::class, 'invoice_id');
   }
}
