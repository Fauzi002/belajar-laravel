<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use App\Models\Extracuricular;

class ExtracuricularController extends Controller
{
    public function index()
    {
        $ekskul = Extracuricular::get();
        return view('extracuricular.extracuricular',[
            'title' => 'Extracuricular',
            'ekskulList' => $ekskul,
        ]);
    }

    public function show($id)
    {
        $ekskul = Extracuricular::with('students')
            ->findOrFail($id);
        return view('extracuricular.extracuricular-detail',[
            'title' => 'Extracuricular Detail',
            'ekskul' => $ekskul,
        ]);
    }

    public function create()
    {
        $student = student::select('id', 'name')->get();
        return view('extracuricular.extracuricular-add',[
            'title' => 'Class - Add',
            'student' => $student,
        ]);
    }

    public function store(Request $request)
    {
        $extracurricular = Extracuricular::create($request->all());
        return redirect('/extracuricular');
    }

    public function edit(Request $request, $id)
    {
        $ekskul = Extracuricular::with('students')->findOrFail($id);
        $student = Student::where('id', '!=', $ekskul->class_id)->get(['id', 'name']);
        return view('extracuricular.extracuricular-edit', [
            'title' => 'Extracuriculars - Edit',
            'ekskul' => $ekskul,
            'student' => $student
        ]);
    }

    public function update(Request $request, $id)
    {
        $ekskul = Extracuricular::findOrFail($id);

        $ekskul->update($request->all());
        return redirect('/extracuricular');
    }
}
