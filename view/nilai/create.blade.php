@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Nilai</h2>
        @if (session('error'))
            <p class="text-danger" align="center">{{ session('error') }}</p>
        @endif

        <form action="/nilai/store/{{ $idKelas }}" method="POST">
            @csrf
            <select name="mengajar_id" id="">
                <option value="" selected>Pilih Guru</option>
                @foreach ($mengajar as $m)
                    <option value="{{ $m->id }}">{{ $m->guru->nama_guru }} - {{ $m->mapel->nama_mapel }}</option>
                @endforeach
            </select>

            <select name="siswa_id" id="">
                <option value="" selected>Pilih Siswa</option>
                @foreach ($siswa as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                @endforeach
            </select>

            <label for="uh">UH</label>
            <input type="number" name="uh" id="uh" min="1" max="100" required>

            <label for="uts">UTS</label>
            <input type="number" name="uts" id="uts" min="1" max="100" required>

            <label for="uas">UAS</label>
            <input type="number" name="uas" id="uas" min="1" max="100" required>

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection
