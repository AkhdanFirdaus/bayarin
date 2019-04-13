@extends('home')

@section('title')
- Pelanggan
@endsection

@section('admincontent')
<div class="container">           
    <ol class="breadcrumb">
        <li class="active">
            <h4>Pelanggan</h4>
        </li>
        <li class="ml-auto d-flex">
        	<form method="POST" action="{{ route('reportPelanggan') }}">
                            {{ csrf_field() }}
	            <button type="submit" href="#tagihanAdd" class="btn btn-default" data-toggle="modal" data-target="#tagihanAdd"><i class="fas fa-print fa-lg"></i></button>
	        </form>
            <a href="#modal-1" class="btn btn-default" data-toggle="modal" data-target="#pelangganAdd"><i class="fas fa-plus fa-lg"></i></a>
        </li>
    </ol>
    <div class="table-responsive">
        <table class="table table-striped bg-light">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Kwh</th>
                    <th scope="col">Tarif/Daya</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggans as $index => $pelanggan)
                <tr>
                    <td scope="col">{{ $index+1 }}</td>
                    <td scope="col">{{ $pelanggan->nama }}</td>
                    <td scope="col">{{ $pelanggan->alamat }}</td>
                    <td scope="col">{{ $pelanggan->no_kwh }}</td>
                    <td scope="col">{{ $pelanggan->tarif->daya }}</td>
                    <td scope="col">
                        <a class="btn btn-primary btn-block mb-2" href="{{ route('dataPenggunaan', $pelanggan->nama) }}"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(session()->has('msg'))
    <div class="my-4">
        <div class="alert alert alert-success" role="alert">
          {{ session('msg') }}
        </div>
    </div>
    @endif
    @include('inc.pelangganmodal')
</div>
@endsection