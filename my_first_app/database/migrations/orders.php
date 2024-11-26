<?php
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to users
    $table->decimal('total', 10, 2);
    $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'returned', 'cancelled'])->default('pending');
    $table->timestamps();
});