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
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table)
         {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Link to categories table
            $table->string('name');
            $table->longText('description');
            $table->decimal('og_price',8,2); // original price of product
            $table->decimal('selling_price',8,2); // the selling price
            $table->string('image');
            $table->integer('stock_s')->default(0); // S stock 
            $table->integer('stock_m')->default(0); // M stock
            $table->integer('stock_l')->default(0); // L stock    
            $table->tinyInteger('status');
            $table->timestamps();
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
