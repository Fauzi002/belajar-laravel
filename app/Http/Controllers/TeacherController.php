<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher',[
            'title' => 'teacher',
            'teacherList' => $teacher,
        ]);
    }

    public function show ($id)
    {
        $teacher = teacher::with('class.students')
            ->findOrFail($id);
        return view('teacher-detail',[
            'title' => 'Teacher Detail',
            'teacher' => $teacher,
        ]);
    }
}
