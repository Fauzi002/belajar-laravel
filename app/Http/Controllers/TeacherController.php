<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherCreateRequest;
use App\Http\Requests\TeacherEditRequest;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

    public function store(TeacherCreateRequest $request)
    {
        $teacher = Teacher::create($request->all());

        if ($teacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new teacher success!');
        }

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

    public function update(TeacherEditRequest $request, $id)
    {
        $updateTeacher = Teacher::findOrFail($id);

        $updateTeacher->update($request->all());

        if ($updateTeacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'update teacher success!');
        }

        return redirect('/teacher');
    }

    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teacher.teacher-delete',[
            'title' => 'Teacher - Delete',
            'teacher' => $teacher,
        ]);
    }

    public function destroy($id)
    {
        $deletedTeacher = Teacher::findOrFail($id);
        $deletedTeacher->delete();

        if ($deletedTeacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete teacher success!');
        }

        return redirect('/teacher');
    }
}
