@extends('template.main')
@section('content')

    <h2>Anda sedang melihat data detail dari siswa yang bernama {{ $student->name }}</h2>

    <div class="my-3 d-flex justify-content-center">
        @if ($student->image != '')
            <img src="{{ asset('storage/photo/' . $student->image) }}" alt="" width="200px">
        @else
            <img src="{{ asset('images/blank-profile-picture-973460-1280-605aadc08ede4874e1153a12.jpeg') }}" alt="" width="200px">
        @endif
    </div>

    <div class="my-5">
    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Homeroom Teacher</th>
        </tr>
        <tr>
            <td>{{ $student->nis }}</td>
            <td>
                @if ($student->gender == 'P')
                    Perempuan
                @else
                    Laki laki
                @endif
            </td>
            <td>{{ $student->class->name }}</td>
            <td>{{ $student->class->homeroomTeacher->name }}</td>
        </tr>
    </table>
    </div>

    <div>
        <h3>Extracurriculars</h3>
        <ol>
            @foreach ($student->extracuriculars as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

    <style>
        th{
            width: 25%;
        }
    </style>
@stop
