<?php

namespace App\Http\Controllers;

use App\Models\Extracuricular;
use Illuminate\Http\Request;

class ExtracuricularController extends Controller
{
    public function index()
    {
        $ekskul = Extracuricular::with('students')->get();
        return view('extracuricular',[
            'title' => 'Extracuricular',
            'ekskulList' => $ekskul,
        ]);
    }
}
