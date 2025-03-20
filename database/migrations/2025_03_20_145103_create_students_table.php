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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name'); // Required
            $table->string('email')->unique(); // Unique and required
            $table->string('phone'); // Required
            $table->date('dob'); // Required
            $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade'); // Foreign key
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
