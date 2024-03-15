<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\PastExam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class McqQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text', 'option_1', 'option_2', 'option_3', 'option_4',
        'correct_option', 'difficulty_level', 'explaination', 'description', 'topic_id'
    ]; // Fillable attributes

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function pastExams() // Assuming a many-to-many relationship
    {
        return $this->belongsToMany(PastExam::class); // Adjust based on your relationship
    }
}