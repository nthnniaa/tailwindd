@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Kelas</h2>
        @if (session('error'))
            <p class="text-danger" align="center">{{ session('error') }}</p>
        @endif

        <form action="/kelas/store" method="post">
            @csrf
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                <option value="" selected>Pilih Kelas</option>
                @foreach ($tingkat_kelas as $t)
                    <option value="{{ $t }}">{{ $t }}</option>
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                <option value="" selected>Pilih Jurusan</option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" id="" required min="1" max="100">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection
