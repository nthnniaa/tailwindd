@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Guru</h2>

        <center>
            @if ($errors->any())
            @foreach ($errors->all() as $error )
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            @endif
        </center>

        <form action="/guru/store" method="post">
            @csrf
                <label for="nip"><b>Nip</b></label>
                <input type="text" name="nip" id="nip">

                <label for="nama_guru"><b>Nama Guru</b></label>
                <input type="text" name="nama_guru" id="nama_guru">

                <label for=""><b>Jenis Kelamin</b></label>
                <input type="radio" name="jk" value="L">Laki-laki
                <input type="radio" name="jk" value="P">Perempuan

                <label for="alamat"><b>Alamat</b></label>
                <textarea name="alamat" id="alamat" rows="5"></textarea>

                <label for="password"><b>Password</b></label>
                <input type="password" name="password" id="password">

                <button class="button-submit" type="submit" name="button">Simpan</button>
        </form>
    </div>
@endsection

