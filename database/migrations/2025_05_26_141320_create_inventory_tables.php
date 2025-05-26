<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   public function up(): void
   {
      // Tabela stocks
      Schema::create('stocks', function (Blueprint $table) {
         $table->id(); // primary key
         $table->date('date')->unique();
         $table->string('name')->nullable();
         $table->timestamps();
      });

      // Tabela invoices
      Schema::create('invoices', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->date('date');
         $table->unsignedBigInteger('stock_id');
         $table->timestamps();

         // Foreign key: stock_id → stocks.id
         $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
      });

      // Tabela products
      Schema::create('products', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->integer('code');
         $table->integer('price');
         $table->integer('sales_price')->nullable();
         $table->integer('amount');
         $table->unsignedBigInteger('invoice_id');
         $table->timestamps();

         // Foreign key: invoice_id → invoices.id
         $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
      });
   }

   public function down(): void
   {
      // A ordem importa por causa das foreign keys
      Schema::dropIfExists('products');
      Schema::dropIfExists('invoices');
      Schema::dropIfExists('stocks');
   }
};
