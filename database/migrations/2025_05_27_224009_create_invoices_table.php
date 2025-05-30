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
      Schema::create('invoices', function (Blueprint $table) {
         $table->id();
         $table->bigInteger('code')->unique();
         $table->string('name');
         $table->date('date');
         $table->unsignedBigInteger('stock_id');
         $table->timestamps();
         $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('invoices');
   }
};
