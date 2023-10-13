@extends('template.main')
@section('content')

    <h1>Ini Halaman Student Yang Sudah di Delete</h1>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>NIS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>
                            <a href="/student/{{ $data->id }}/restore" class="btn btn-primary">Restore</a>
                            <a href="students" class="btn btn-secondary">Back</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
