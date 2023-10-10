<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $student = student::get();
        return view('student',[
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
        return view('student-detail',[
            'title' => 'Student Detail',
            'student' => $student,
        ]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add',[
            'title' => 'students - Add',
            'class' => $class,
        ]);
    }

    public function store(Request $request)
    {
        // $student = new student;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student = student::create($request->all());
        return redirect('/students');
    }
}
