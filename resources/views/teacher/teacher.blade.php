@extends('template.main')
@section('content')

    <h1>Ini Halaman Teacher</h1>

    <div class="my-5">
        <a href="teacher-add" class="btn btn-primary">Add Data</a>
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Teacher List</h3>


    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="teacher/{{ $item->id }}" class="btn btn-warning">Detail</a>
                    <a href="teacher-edit/{{ $item->id }}" class="btn btn-success text-black">Edit</a>
                    <a href="teacher-delete/{{ $item->id }}" class="btn btn-danger text-black">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
