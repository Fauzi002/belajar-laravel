@extends('template.main')
@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="teachers" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Teacher Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Add Data</button>
            </div>
        </form>
    </div>

@stop
