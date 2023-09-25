<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $student = student::with(['class', 'extracuriculars'])->get();
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
}
