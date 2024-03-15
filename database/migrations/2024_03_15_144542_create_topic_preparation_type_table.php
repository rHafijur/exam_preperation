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
        Schema::create('topic_preparation_type', function (Blueprint $table) {
            $table->unsignedBigInteger('topic_id');
            $table->unsignedBigInteger('preparation_type_id');
            $table->primary(['topic_id', 'preparation_type_id']); // Composite primary key

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('preparation_type_id')->references('id')->on('preparation_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_preparation_type');
    }
};