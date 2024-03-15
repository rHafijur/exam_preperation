<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastExamMcqQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_exam_mcq_question', function (Blueprint $table) {
            $table->unsignedBigInteger('past_exam_id');
            $table->unsignedBigInteger('mcq_question_id');
            $table->integer('marks')->nullable(); // Optional: Marks allocated for the question
            $table->decimal('weightage', 5, 2)->nullable(); // Optional: Weightage of the question

            $table->primary(['past_exam_id', 'mcq_question_id']); // Composite primary key

            $table->foreign('past_exam_id')->references('id')->on('past_exams')->onDelete('cascade');
            $table->foreign('mcq_question_id')->references('id')->on('mcq_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('past_exam_mcq_question');
    }
}