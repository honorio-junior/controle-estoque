<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockModel extends Model
{
   protected $table = 'stocks';
   protected $fillable = ['date', 'name'];

   public function invoices()
   {
      return $this->hasMany(InvoiceModel::class);
   }
}
