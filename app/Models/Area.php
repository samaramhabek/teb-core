<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;
use App\Models\Doctor;
use App\Models\City;

class Area extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
