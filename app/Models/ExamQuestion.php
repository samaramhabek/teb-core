<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ExamQuestion extends Model
{
    
    use HasFactory ,HasTranslations;
    protected $guarded=[];
    protected $table='exam_questions';
    public $translatable = ['text','answer1','answer2','answer3','answer4'];
    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
}
