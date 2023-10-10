@extends('template.main')
@section('content')

    <h1>Ini Halaman Extracuricular</h1>

    <div class="my-5">
        <a href="extracuricular-add" class="btn btn-primary">Add Extracurricular</a>
    </div>

    <h3>Extracuricular List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskulList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['name'] }}</td>
                <td><a href="extracuricular/{{$data->id}}" class="btn btn-warning">detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop
