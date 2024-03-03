<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('SaleID');
            $table->unsignedInteger('product_id');
            $table->string('vendor');
            $table->integer('total_qty');
            $table->integer('qty_sold');
            $table->decimal('selling_price', 10, 2);
            $table->date('date_sold');
            $table->string('sold_to');
            $table->timestamps();
    
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
