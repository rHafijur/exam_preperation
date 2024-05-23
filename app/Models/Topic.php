<?php

namespace App\Models;

use App\Models\Chapter;
use App\Models\PreparationType;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    use LogsActivity;


    protected $fillable = ['name', 'topic_no', 'chapter_id']; // Fillable attributes

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'topic_no','chapter.name']);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function preparationTypes()
    {
        return $this->belongsToMany(PreparationType::class, 'topics_has_prepration_types');
    }
}
