<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function index()
    {   
        $student = student::all();
        return view('student',[
            'title' => 'students',
            'studentList' => $student, 
        ]);
    }
}
