@extends('template.main')
@section('content')

    <h1>Ini Halaman Extracurricular Yang Sudah di Delete</h1>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskul as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['name'] }}</td>
                <td>
                    <a href="/extracuricular/{{ $data->id }}/restore" class="btn btn-primary">Restore</a>
                    <a href="/extracuricular" class="btn btn-secondary">Back</a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
@stop
