@extends('template.main')
@section('content')

    <h2>Anda sedang melihat data detail dari kelas {{ $class->name }}</h2>

    <div class="mt-5">
        <h4>Homeroom Teacher : {{ $class->homeroomTeacher->name }}</h4>
    </div>

    <div class="mt-5">
        <h4>List Student</h4>
        <ol>
            @foreach ($class->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@stop
