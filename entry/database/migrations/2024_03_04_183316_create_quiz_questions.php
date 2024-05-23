<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('quiz_id');
            $table->string('question', 500);
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('quizes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
