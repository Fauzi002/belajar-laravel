@extends('template.main')
@section('content')

<div class="mt-5">
    <h2>Are you sure to delete data : {{ $teacher->name }}</h2>

    <form style="display: inline-block" action="/teacher-destroy/{{ $teacher->id }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Delete Data</button>
    </form>

    <a href="/teacher" class="btn btn-primary">Cancel</a>
</div>

@stop
