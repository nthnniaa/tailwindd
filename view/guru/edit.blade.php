@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Ubah Data Guru</h2>

        <center>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </center>

        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <label for="nip"><b>Nip</b></label>
            <input type="text" name="nip" value="{{ $guru->nip }}" id="nip">

            <label for="nama_guru"><b>Nama Guru</b></label>
            <input type="text" name="nama_guru" id="nama_guru" value="{{ $guru->nama_guru }}">

            <label for=""><b>Jenis Kelamin</b></label>
            <input type="radio" name="jk" value="L" {{ $guru->jk == 'L' ? 'checked' : '' }}>Laki-laki
            <input type="radio" name="jk" value="P" {{ $guru->jk == 'P' ? 'checked' : '' }}>Perempuan

            <label for="alamat"><b>Alamat</b></label>
            <textarea name="alamat" id="alamat" rows="5">{{ $guru->alamat }}</textarea>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" id="password" value="{{ $guru->password }}">

            <button class="button-submit" type="submit">Ubah</button>
        </form>
    </div>
@endsection
