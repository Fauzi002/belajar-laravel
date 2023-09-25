@extends('template.main')
@section('content')

    <h1>Ini Halaman Extracuricular</h1>
    <h3>Extracuricular List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Anggota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskulList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['name'] }}</td>
                <td>
                    @foreach ($data->students as $item)
                       - {{ $item->name }} <br>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop
