@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Ubah Data Mapel</h2>

        <center>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/mapel/update/{{ $mapel->id }}" method="post">
            @csrf
            <label for="nama_mapel"><b>MATA PELAJARAN</b></label>
            <input type="text" name="nama_mapel" value="{{ $mapel->nama_mapel }}" id="nama_mapel">

            <button class="button-submit" type="submit">Ubah</button>
        </form>
    </div>
@endsection
