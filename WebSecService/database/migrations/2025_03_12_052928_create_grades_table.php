<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Associate grades with users
            $table->string('course_code');
            $table->string('course_name');
            $table->integer('credit_hours'); // Credit hours
            $table->string('grade'); // Grade (e.g., A, B+, C)
            $table->integer('term'); // Term number
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
