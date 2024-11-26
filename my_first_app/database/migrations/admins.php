<?php
Schema::create('admin_users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password'); // Store hashed password
    $table->timestamps();
});
