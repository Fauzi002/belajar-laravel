@extends('template.main')
@section('content')

    <h1>Ini Halaman Teacher</h1>
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
                <td><a href="teacher/{{ $item->id }}">detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
