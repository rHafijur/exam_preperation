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

    public function scopeFilter($query, $filters)
    {
        if(isset($filters['name'])  &&  $filters['name'] != null) {
            $query->where('name', 'like', "%".$filters['name']."%");
        }
        if(isset($filters['chapter_id'])  &&  $filters['chapter_id'] != null) {
            $query->where('chapter_id', $filters['chapter_id']);
        }
        if(isset($filters['subject_id'])  &&  $filters['subject_id'] != null) {
            $query->whereHas('chapter', function ($q) use ($filters) {
                $q->where('subject_id', $filters['subject_id']);
            });
        }
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

}
