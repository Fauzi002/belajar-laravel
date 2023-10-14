@extends('template.main')
@section('content')
    <h1>Ini Halaman Student</h1>

    <div class="my-5">
        <a href="student-add" class="btn btn-primary">Add Data</a>
        <a href="student-deleted" class="btn btn-secondary">Show Deleted Data</a>
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Student List</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="GET">
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Keyword" name="keyword" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="input-group-text btn btn-primary" id="addon-wrapping">SEARCH</button>
              </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Class</th>
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
                <td>{{ $data->class->name }}</td>
                <td>
                    <a href="student/{{ $data->id }}" class="btn btn-warning">Detail</a>
                    <a href="student-edit/{{ $data->id }}" class="btn btn-success text-black">Edit</a>
                    <a href="student-delete/{{ $data->id }}" class="btn btn-danger text-black">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5">
        {{ $studentList->withQueryString()->links() }}
    </div>

    @stop
