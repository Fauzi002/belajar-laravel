@extends('template.main')
@section('content')
    <h1>Ini Halaman Student</h1>
    <h3>Student List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Class</th>
                <th>Extracuriculars</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->class['name'] }}</td>
                <td>
                    @foreach ($data->extracuriculars as $item)
                        - {{ $item->name }} <br>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @stop
