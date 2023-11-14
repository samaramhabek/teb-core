<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use App\Models\Service;
class Doctor extends Model implements HasMedia 
{
    use HasFactory ,HasTranslations ,  InteractsWithMedia;
    protected $guarded=[];
    public $translatable = ['first_name','last_name','title','description','region','address'];
      public function city(){

        return $this->belongsTo(City::class)->withDefault([
            'name' => '-'
        ]);
    }
      public function category_parent()
    {
        return $this->belongsToMany(Category::class, 'category_id')->withDefault();
    }

    public function category_child()
    {
        return $this->belongsToMany(Category::class, 'child_category_id')->withDefault([
            'name' => '-'
        ]);
    }
    public function insurances()
    {
        return $this->belongsToMany(Insurance::class);
    }
    public function service()
    {
        return $this->belongsToMany(Service::class);
    }
    public function cases()
    {
        return $this->belongsToMany(Cases::class, 'doctor_case','case_id','doctor_id');
    }
    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

}
