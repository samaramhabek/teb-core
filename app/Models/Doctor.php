<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

use Illuminate\Contracts\Support\Arrayable;
use App\Models\Service;
class Doctor extends Model implements  Arrayable
{
    use HasFactory ,HasTranslations;
    protected $guarded=[];
    public $translatable = ['first_name','last_name','title'];
      public function city(){

        return $this->belongsTo(City::class);
      }
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
    public function insurances()
    {
        return $this->belongsTo(Insurance::class)->withDefault();
    }
    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
    public function cases()
    {
        return $this->belongsTo(Cases::class)->withDefault();
    }
    public function treatments()
    {
        return $this->belongsTo(Treatment::class)->withDefault();
    }

}
