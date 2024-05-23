<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'chapter_no', 'description', 'subject_id']; // Fillable attributes

    public function scopeFilter($query, $filters)
    {
        if(isset($filters['name'])  &&  $filters['name'] != null) {
            $query->where('name', 'like', "%".$filters['name']."%");
        }

        if(isset($filters['subject_id'])  &&  $filters['subject_id'] != null) {
            $query->where('subject_id', $filters['subject_id']);
        }
    }

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
