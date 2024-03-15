<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\PastExam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreparationType extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Fillable attributes

    public function pastExams()
    {
        return $this->hasMany(PastExam::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_preparation_type');
    }

    public function chapters()
    {
        return $this->belongsToMany(Chapter::class, 'chapter_preparation_type');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topics_has_prepration_types');
    }
}