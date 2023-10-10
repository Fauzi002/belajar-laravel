<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ClassController extends Controller
{
    public function index()
    {
        //lazy load
        // $class = ClassRoom::all(); //cara request data => ketika dibutuhkan ambil data
        //SELECT * FROM table Class
        //SELECT * FROM student WHERE class = 11 RPL A
        //SELECT * FROM student WHERE class = 11 RPL B
        //SELECT * FROM student WHERE class = 11 RPL C

        //eager Load
        $class = ClassRoom::get(); //cara request data
        //SELECT * FROM table class
        //SELECT * FROM stuedent WHERE class in (11 RPL A, 11 RPL B, 11 RPL C)
        return view('classroom',[
            'title' => 'Class',
            'classList' => $class,
        ]);
    }

    public function show($id)
    {
        $class = Classroom::with(['students', 'homeroomTeacher'])
                ->findOrFail($id);
        return view('classroom-detail',[
            'title' => 'Class Detail',
            'class' => $class,
        ]);
    }

    public function create()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view('classroom-add',[
            'title' => 'Class - Add',
            'teacher' => $teacher,
        ]);
    }

    public function store(Request $request)
    {
        $class = ClassRoom::create($request->all());
        return redirect('/class');
    }

}
