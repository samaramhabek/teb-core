<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasFactory ,HasTranslations;
    protected $guarded=[];
    public $translatable = ['text','answer1','answer2','answer3','answer4'];
    public function Lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
