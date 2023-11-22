<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Course extends Model implements HasMedia 
{
    use HasFactory ,HasTranslations ,  InteractsWithMedia;
    protected $guarded=[];
    public $translatable = ['category_text','name','description'];
    public function category_parent()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function category_child()
    {
        return $this->belongsTo(Category::class, 'child_category_id')->withDefault([
            'name' => '-'
        ]);
    }
    public function trainer()
    {
        return $this->belongsTo(Doctor::class, 'trainer_id')->where('is_trainer', 1);
    }

}
