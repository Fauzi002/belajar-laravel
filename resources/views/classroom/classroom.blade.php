@extends('template.main')
@section('content')
    <h1>Ini Halaman Class</h1>

    <div class="my-5">
        <a href="class-add" class="btn btn-primary">Add data</a>
    </div>

    <h3>Class List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <a href="class/{{ $data->id }}" class="btn btn-warning">Detail</a>
                    <a href="class-edit/{{ $data->id }}" class="btn btn-success text-black">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
