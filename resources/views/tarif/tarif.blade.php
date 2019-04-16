@extends('home')

@section('title')
- Pelanggan
@endsection

@section('style')

@endsection

@section('admincontent')
<div class="container">           
    <ol class="breadcrumb">
        <li class="active">
            <h4>Tarif</h4>
        </li>
        <li class="ml-auto d-flex">
        	<form method="POST" action="{{ route('reportTarif') }}">
                {{ csrf_field() }}
	            <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#tagihanAdd"><i class="fas fa-print fa-lg"></i></button>
	        </form>
            <a href="#tarifAdd" class="btn btn-default" data-toggle="modal" data-target="#tarifAdd"><i class="fas fa-plus fa-lg"></i></a>
        </li>
    </ol>
    <div class="table-responsive">
        <table class="table table-striped bg-light">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Daya</th>
                    <th scope="col">Tarif per Kwh</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarifs as $index => $tarif)
                <tr class="item{{$tarif->id}}">
                    <td scope="col">{{ $index+1 }}</td>
                    <td scope="col">{{ $tarif->daya }}</td>
                    <td scope="col">Rp. {{ number_format($tarif->tarifperkwh) }}</td>
                    <td scope="col">
                        <a href="#tarifEditModal" class="btn btn-warning tarifedit" data-id="{{ $tarif->id }}" data-daya="{{ $tarif->daya }}" data-tarifperkwh="{{ $tarif->tarifperkwh }}"><i class="fas fa-pen"></i></a>
                        <a href="#tarifDel" data-id="{{$tarif->id}}" data-daya="{{$tarif->daya}}" class="btn btn-danger deltrf"><i class="fas fa-trash"></i></a>
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
    @include('inc.tarifmodal')
</div>
@endsection