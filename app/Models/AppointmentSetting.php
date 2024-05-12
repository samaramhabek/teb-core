<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentSetting extends Model
{
    use HasFactory;
    protected$guarder=[];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
