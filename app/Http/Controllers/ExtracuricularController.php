<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracuricular;

class ExtracuricularController extends Controller
{
    public function index()
    {
        $ekskul = Extracuricular::get();
        return view('extracuricular',[
            'title' => 'Extracuricular',
            'ekskulList' => $ekskul,
        ]);
    }

    public function show($id)
    {
        $ekskul = Extracuricular::with('students')
            ->findOrFail($id);
        return view('extracuricular-detail',[
            'title' => 'Extracuricular Detail',
            'ekskul' => $ekskul,
        ]);
    }
}
