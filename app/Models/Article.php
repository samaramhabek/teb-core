<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia 
{
    use HasFactory , InteractsWithMedia;
    protected $guarded=[];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function category_parent()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();; // Assuming the foreign key is 'parent_category_id'
    }

    public function category_child()
    {
        return $this->belongsTo(Category::class, 'child_category_id'); // Assuming the foreign key is 'child_category_id'
    }

}
