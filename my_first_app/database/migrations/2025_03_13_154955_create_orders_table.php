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
        Schema::create('orders', function (Blueprint $table) 
        {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Link to user
            $table->foreignId('shipping_address_id')->constrained('shipping_addresses')->onDelete('cascade'); // Link to shipping address
            $table->enum('status', ['pending','processing', 'shipped', 'delivered', 'cancelled'])->default('pending'); // Order status
            $table->decimal('total_amount', 10, 2); // Total order price
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
