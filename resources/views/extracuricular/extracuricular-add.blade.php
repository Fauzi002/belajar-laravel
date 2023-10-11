@extends('template.main')
@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="extracuriculars" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Extracurricular Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="student">Member</label>
                <select name="student_id" id="student" class="form-control" required>
                    <option value="" selected disabled>Select One</option>
                    @foreach ($student as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Add Data</button>
            </div>
        </form>
    </div>

@stop
