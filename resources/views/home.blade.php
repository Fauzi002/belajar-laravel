@extends('template.main')
@section('content')

    <h1>ini halaman home</h1>
    <h2>selamat datang, {{ Auth::user()->name }}. Anda adalah {{ Auth::user()->role->name }}</h2>

</div>
@stop
