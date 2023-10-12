@extends('template.main')
@section('content')

<div class="mt-5">
    <h2>Are you sure to delete data : {{ $ekskul->name }}</h2>

    <form style="display: inline-block" action="/extracuricular-destroy/{{ $ekskul->id }}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Delete Data</button>
    </form>

    <a href="/extracuricular" class="btn btn-primary">Cancel</a>
</div>

@stop
