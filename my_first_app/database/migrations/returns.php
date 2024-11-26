<?php
Schema::create('returns', function (Blueprint $table) {
    $table->id();
    $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Reference to orders
    $table->foreignId('inventory_id')->constrained()->onDelete('cascade'); // Reference to inventory
    $table->unsignedInteger('quantity');
    $table->text('reason')->nullable(); // Reason for return
    $table->enum('return_status', ['pending', 'approved', 'rejected'])->default('pending');
    $table->timestamps();
});
