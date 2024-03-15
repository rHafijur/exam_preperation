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
        Schema::create('chapter_preparation_type', function (Blueprint $table) {
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('preparation_type_id');
            $table->primary(['chapter_id', 'preparation_type_id']); // Composite primary key

            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->foreign('preparation_type_id')->references('id')->on('preparation_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapter_preparation_type');
    }
};