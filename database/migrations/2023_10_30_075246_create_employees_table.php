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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Add the first_name column
            $table->string('last_name'); // Add the last_name column
            $table->foreignId('company_id')->constrained(); // Add the company_id column as a foreign key
            $table->string('email')->nullable(); // Add the email column (nullable)
            $table->string('phone')->nullable(); // Add the phone column (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};