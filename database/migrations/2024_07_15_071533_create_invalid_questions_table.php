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
        Schema::create('invalid_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('answer')->nullable();
            $table->string('choice_1')->nullable();
            $table->string('choice_2')->nullable();
            $table->string('choice_3')->nullable();
            $table->string('choice_4')->nullable();
            $table->string('category')->nullable();
            $table->unsignedInteger('invalidated_by');
            $table->json('stats')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invalid_questions');
    }
};
