<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('products', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->integer('code');
         $table->float('price');
         $table->float('sales_price')->nullable();
         $table->integer('amount');
         $table->unsignedBigInteger('invoice_id');
         $table->timestamps();
         $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('products');
   }
};
