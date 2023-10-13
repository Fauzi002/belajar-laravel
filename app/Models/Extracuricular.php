<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extracuricular extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_extracuricular', 'extracuricular_id', 'student_id');
    }
}
