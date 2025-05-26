<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
   protected $table = 'products';
   protected $fillable = ['name', 'code', 'price', 'sales_price', 'amount', 'invoice_id'];

   public function invoice() {
       return $this->belongsTo(InvoiceModel::class, 'id');
   }
}
