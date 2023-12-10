<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
Use App\Models\Doctor;

class Hospital extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class,'doctor_hospitals','hospital_id','doctor_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
