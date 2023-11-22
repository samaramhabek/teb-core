<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lesson extends Model implements HasMedia 
{
    use HasFactory ,HasTranslations ,  InteractsWithMedia;
    protected $guarded=[];
    public $translatable = ['name'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
