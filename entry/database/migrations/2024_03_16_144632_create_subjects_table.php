<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('course_id');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
