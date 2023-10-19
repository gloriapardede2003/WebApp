@extends('mahasiswa.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Mahasiswa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Create New Mahasiswa</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswa as $mahasiswa)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $mahasiswa->nama }}</td>
        <td>{{ $mahasiswa->nim }}</td>
        <td>{{ $mahasiswa->alamat }}</td>
        <td>{{ $mahasiswa->no_telpon }}</td>
        <td>
            <form action="{{ route('mahasiswa.destroy',$mahasiswa->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('mahasiswa.show',$mahasiswa->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mahasiswa->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



@endsection