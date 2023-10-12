@extends('template.main')
@section('content')

    <div class="mt-5 col-8 m-auto">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="extracuriculars" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Extracurricular Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Add Data</button>
            </div>
        </form>
    </div>

@stop
