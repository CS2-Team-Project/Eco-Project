<?php

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password'); // Store hashed password
    $table->string('phone')->nullable(); //additional functional requirement
    $table->timestamps(); // Adds created_at and updated_at
});
