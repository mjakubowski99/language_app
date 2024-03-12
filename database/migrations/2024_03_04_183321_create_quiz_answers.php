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
        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('quiz_question_id');
            $table->string('answer');
            $table->unsignedSmallInteger('order');
            $table->boolean('is_valid');

            $table->timestamps();

            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_answers');
    }
};
