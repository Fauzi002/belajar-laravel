@extends('template.main')
@section('content')
    <h1>Ini Halaman Student</h1>

    <div class="my-5">
        <a href="student-add" class="btn btn-primary">Add data</a>
    </div>

    <h3>Student List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->nis }}</td>
                <td>
                    <a href="student/{{ $data->id }}" class="btn btn-warning">Detail</a>
                    <a href="student-edit/{{ $data->id }}" class="btn btn-success text-black">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @stop
