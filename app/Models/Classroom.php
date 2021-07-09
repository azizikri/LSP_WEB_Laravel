<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function teaching()
    {
        return $this->hasMany(Teaching::class);
    }

}
