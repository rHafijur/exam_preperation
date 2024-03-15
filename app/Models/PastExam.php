<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastExam extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'preparation_type_id']; // Fillable attributes

    public function preparationType()
    {
        return $this->belongsTo(PreparationType::class);
    }

    public function mcqQuestions()
    {
        return $this->belongsToMany(McqQuestion::class, 'past_exam_mcq_question'); // Using the pivot table
    }
}