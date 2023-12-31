@extends('template.main')
@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="/class/{{ $class->id }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Class Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $class->name }}" required>
            </div>

            <div class="mb-3">
                <label for="teacher">Teacher</label>
                <select name="teacher_id" id="teacher" class="form-control" required>
                    <option value="{{ $class->homeroomTeacher->id }}">{{ $class->homeroomTeacher->name }}</option>
                    @foreach ($teacher as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Update Data</button>
            </div>
        </form>
    </div>

@stop
