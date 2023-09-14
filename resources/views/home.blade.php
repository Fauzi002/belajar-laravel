@extends('template.main')
@section('content')
    
    <h1>ini halaman home</h1>
    <h2>selamat datang, {{ $name }}. Anda adalah {{ $role }}</h2>

    <table>
        <tr>
            <th>no.</th>
            <th>nama</th>
        </tr>
        @foreach ($buah as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data }}</td>
        </tr>
        @endforeach
    </table>
</div>
@stop