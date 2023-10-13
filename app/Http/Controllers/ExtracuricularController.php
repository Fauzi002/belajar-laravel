<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtracurricularCreateRequest;
use App\Http\Requests\ExtracurricularEditRequest;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

    public function store(ExtracurricularCreateRequest $request)
    {
        $extracurricular = Extracuricular::create($request->all());

        if ($extracurricular) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new extracurricular success!');
        }

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

    public function update(ExtracurricularEditRequest $request, $id)
    {
        $updateEkskul = Extracuricular::findOrFail($id);
        $updateEkskul->update($request->all());

        if ($updateEkskul) {
            Session::flash('status', 'success');
            Session::flash('message', 'update extracurricular success!');
        }

        return redirect('/extracuricular');
    }

    public function delete($id)
    {
        $ekskul = Extracuricular::findOrFail($id);

        return view('extracuricular.extracuricular-delete', [
            'title' => 'Extracuriculars - Delete',
            'ekskul' => $ekskul,
        ]);
    }

    public function destroy($id)
    {
        $deletedEkskul = Extracuricular::findOrFail($id);
        $deletedEkskul->delete();

        if ($deletedEkskul) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete extracurricular success!');
        }

        return redirect('/extracuricular');
    }

    public function deletedExtracuricular()
    {
        $deletedEkskul = Extracuricular::onlyTrashed()->get();
        return view('extracuricular.extracuricular-deleted-list', [
            'title' => 'Extracuricular-Deleted-List',
            'ekskul' => $deletedEkskul
        ]);
    }

    public function restore($id)
    {
        $deletedEkskul = Extracuricular::withTrashed()->where('id', $id)->restore();

        if ($deletedEkskul) {
            Session::flash('status', 'success');
            Session::flash('message', 'restore extracurricular success!');
        }

        return redirect('/extracuricular');
    }

}
