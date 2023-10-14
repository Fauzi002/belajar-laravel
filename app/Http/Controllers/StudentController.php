<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentEditRequest;
use App\Models\student;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $student = student::with('class')
                        ->where('name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('gender', $keyword)
                        ->orWhere('nis', 'LIKE', '%' . $keyword . '%')
                        ->orWhereHas('class', function($query) use($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        })
                        ->Paginate(10);
        return view('student.student',[
            'title' => 'students',
            'studentList' => $student,
        ]);

        // $nilai = [9, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 4, 5, 6];

        // $nilaiKaliDua = [];
        // foreach ($nilai as $value) {
        //     array_push($nilaiKaliDua, $value * 2);
        // }

        // dd($nilaiKaliDua);

        // $aaa = collect($nilai)->map(function($value){
        //     return $value * 2;
        // })->all();

        // dd($aaa);
    }

    public function show($id)
    {
        $student = Student::with(['class.homeroomTeacher', 'extracuriculars'])
            ->findOrFail($id);
        return view('student.student-detail',[
            'title' => 'Student Detail',
            'student' => $student,
        ]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student.student-add',[
            'title' => 'students - Add',
            'class' => $class,
        ]);
    }

    public function store(StudentCreateRequest $request)
    {
        // $student = new student;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student = student::create($request->all());

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new student success!');
        }

        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student.student-edit', [
            'title' => 'students - Edit',
            'student' => $student,
            'class' => $class
        ]);
    }

    public function update(StudentEditRequest $request, $id)
    {
        $updateStudent = Student::findOrFail($id);

        $updateStudent->update($request->all());

        if ($updateStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'update student success!');
        }

        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student.student-delete', [
            'title' => 'students - Delete',
            'student' => $student
        ]);
    }

    public function destroy($id)
    {
        $deletedStudent = Student::findOrFail($id);
        $deletedStudent->delete();

        if ($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $deletedStudent = Student::onlyTrashed()->get();
        return view('student.student-deleted-list', [
        'title' => 'Student-Deleted-List',
        'student' => $deletedStudent
    ]);
    }

    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();

        if ($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'restore student success!');
        }

        return redirect('/students');
    }
}
