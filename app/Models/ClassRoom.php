<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected    $table = 'class' ;

    public function students()
    {
        return $this->hasMany(student::class, 'class_id', 'id');
    }
}
