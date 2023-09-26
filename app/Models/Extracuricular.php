<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracuricular extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_extracuricular', 'extracuricular_id', 'student_id');
    }
}