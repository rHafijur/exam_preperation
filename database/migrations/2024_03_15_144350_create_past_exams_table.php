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
        Schema::create('past_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prepration_type_id'); // Foreign key
            $table->string('year');
            $table->foreign('prepration_type_id')->references('id')->on('preparation_types')->onDelete('cascade'); // Foreign key constraint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_exams');
    }
};