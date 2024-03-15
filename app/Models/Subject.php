<?php

namespace App\Models;

use App\Models\Chapter;
use App\Models\PreparationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Fillable attributes

    public function preparationTypes()
    {
        return $this->belongsToMany(PreparationType::class, 'subject_preparation_type');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}