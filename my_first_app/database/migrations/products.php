<?php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2); // e.g., 1000.00
    $table->unsignedInteger('stock'); // Remaining stock
    $table->boolean('is_sold')->default(false); // True if sold out
    $table->timestamps();
});
