<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Category;
use App\Models\Service;
use App\Models\Treatment;
use App\Models\Insurance;
Use App\Models\Hospital;
use App\Models\Cases;
use App\Models\Area;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class Doctor extends Authenticatable implements HasMedia 
{
    use HasApiTokens, Notifiable, HasRoles;
    use HasFactory ,HasTranslations ,  InteractsWithMedia;
    protected $guarded=[];
    public $translatable = ['first_name','last_name','title','description','region','address'];
      public function city(){

        return $this->belongsTo(City::class)->withDefault([
            'name' => '-'
        ]);
    }
    public function area(){

        return $this->belongsTo(Area::class);
    }
    //   public function category_parent()
    // {
    //     return $this->belongsToMany(Category::class, 'category_id')->withDefault();
    // }

    public function category_parent()
{
    return $this->belongsToMany(Category::class, 'category_doctors')->withTimestamps();
}
public function category_child()
{
    return $this->belongsToMany(Category::class, 'category_doctors')->withTimestamps();
}
    
    // public function categories()
    // {
    //     // Assuming you want to get both parent and child categories
    //     return $this->belongsToMany(Category::class, 'category_doctors')->withDefault([ 'name' => '-']);
    // }
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
        return $this->belongsToMany(Cases::class, 'doctor_case','doctor_id','case_id');
    }
    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }
    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class,'doctor_hospitals','doctor_id','hospital_id');
    }
    public function getUserAvatarAttribute()
    {
        if ($this->avatar != null){
            return asset('storage/'. $this->avatar);
        }else{
            return 'https://ui-avatars.com/api/?name='. $this->name. '&background=random';
        }
    }
    public function doctorAppointments()
    {
        return $this->hasMany(DoctorAppointment::class);
    }
    public function AppointmentSetting()
    {
        return $this->hasMany(AppointmentSetting::class);
    }

}
