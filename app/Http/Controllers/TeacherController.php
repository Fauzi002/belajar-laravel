<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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

    public function create()
    {
        $teacher = Teacher::all();
        return view('teacher-add',[
            'title' => 'Teacher - Add',
            'teacher' => $teacher,
        ]);
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());
        return redirect('/teacher');
    }
}
