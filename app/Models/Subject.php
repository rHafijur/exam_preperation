<?php

namespace App\Models;

use App\Models\Chapter;
use App\Models\PreparationType;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    use LogsActivity;




    protected $fillable = ['name','display_name', 'display_order']; // Fillable attributes

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'display_name']);
    }


    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
