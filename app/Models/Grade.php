<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function teaching()
    {
        return $this->belongsTo(teaching::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
