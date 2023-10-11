@extends('template.main')
@section('content')

    {{ $ekskul->students }}
    <br> <br>
    {{ $student }}

    <div class="mt-5 col-8 m-auto">
        <form action="/extracuricular/{{ $ekskul->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Extracurricular Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $ekskul->name }}" required>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update Data</button>
            </div>
        </form>
    </div>

@stop
