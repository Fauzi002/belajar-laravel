@extends('template.main')
@section('content')
    <h1>Ini Halaman Class</h1>

    <div class="my-5">
        <a href="class-add" class="btn btn-primary">Add data</a>
        <a href="class-deleted" class="btn btn-secondary">Show Deleted Data</a>
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Class List</h3>

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
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <a href="class/{{ $data->id }}" class="btn btn-warning">Detail</a>
                    <a href="class-edit/{{ $data->id }}" class="btn btn-success text-black">Edit</a>
                    <a href="class-delete/{{ $data->id }}" class="btn btn-danger text-black">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5">
        {{ $classList->withQueryString()->links() }}
    </div>

@stop
