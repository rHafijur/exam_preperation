<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'subject_id']; // Fillable attributes

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function preparationTypes()
    {
        return $this->belongsToMany(PreparationType::class, 'chapter_preparation_type');
    }
}