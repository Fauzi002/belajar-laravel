<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher.teacher',[
            'title' => 'teacher',
            'teacherList' => $teacher,
        ]);
    }

    public function show ($id)
    {
        $teacher = teacher::with('class.students')
            ->findOrFail($id);
        return view('teacher.teacher-detail',[
            'title' => 'Teacher Detail',
            'teacher' => $teacher,
        ]);
    }

    public function create()
    {
        $teacher = Teacher::all();
        return view('teacher.teacher-add',[
            'title' => 'Teacher - Add',
            'teacher' => $teacher,
        ]);
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());
        return redirect('/teacher');
    }

    public function edit(Request $request, $id)
    {
        $teacher = Teacher::with('class.students')->findOrFail($id);
        return view('teacher.teacher-edit', [
            'title' => 'Teachers - Edit',
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->update($request->all());
        return redirect('/teacher');
    }
}
