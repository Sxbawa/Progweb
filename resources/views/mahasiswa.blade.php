@extends('layouts/main')

@section('title', 'Mahasiswa')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <form action="/mahasiswa/pencarian" method="GET" class="form-inline my-2 my-lg-0 float-right">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
              </form>
        </div>
        <div class="card-body">
            {{-- <button type="button" class="btn btn-primary">Tambah Data</button> --}}
            <a class="btn btn-outline-primary" href="/mahasiswa/formtambah"  ><i class="bi bi-folder-plus"></i> Tambah Data</a>
            @if(session('alert'))
            <div class="alert alert-success mt-3">
                  {{session('alert')}}
              </div>
              <div class="alert alert-success" role="alert">
  
</div>

            @endif
            <table class="table table-hover mt-2">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Minat</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($mhs as $idx => $data)
                    <tr>
                       <!-- <td>{{ $mhs->firstitem() + $idx }}</td> -->
                       <td>{{ $data->id }}</td>
                       <td>{{ $data->nim }}</td>
                       <td>{{ $data->name }}</td>
                       <td>{{ $data->gender }}</td>
                       <td>{{ $data->prodi }}</td>
                       <td>{{ $data->minat }}</td>
                       <td>
                       <a href="/mahasiswa/formedit/{{$data->id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Update</a>
                       <a href="/mahasiswa/delete/{{$data->id}}" class="btn btn-danger"> <i class="bi bi-trash-fill"></i> Delete</a>
                      </td>
                      </tr> 
                    @endforeach
                </tbody>
              </table>
              <span class="alert alert-success">
                Jumlah Data : {{$mhs->count()}}</span>
              <span class="float-right">{{$mhs->links()}}</span>
        </div>
    </div>
   
@endsection     