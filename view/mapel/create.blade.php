@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Mapel</h2>

        <center>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/mapel/store" method="post">
            @csrf
            <label for="nama_mapel"><b>MATA PELAJARAN</b></label>
            <input type="text" name="nama_mapel" id="nama_mapel">

            <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>
    </div>
@endsection
