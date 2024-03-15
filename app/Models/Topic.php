<?php

namespace App\Models;

use App\Models\Chapter;
use App\Models\PreparationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'chapter_id']; // Fillable attributes

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function preparationTypes()
    {
        return $this->belongsToMany(PreparationType::class, 'topics_has_prepration_types');
    }
}