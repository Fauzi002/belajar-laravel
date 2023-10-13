@extends('template.main')
@section('content')

    <h1>Ini Halaman Teacher Yang Sudah di Delete</h1>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacher as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="teacher/{{ $item->id }}/restore" class="btn btn-primary">Restore</a>
                    <a href="teacher" class="btn btn-secondary">Back</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop
