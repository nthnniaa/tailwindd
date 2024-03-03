@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Ubah Data Nilai</h2>
        @if (session('error'))
            <p class="text-danger" align="center">{{ session('error') }}</p>
        @endif

        <form action="/nilai/update/{{ $idKelas }}/{{ $nilai->id }}" method="POST">
            @csrf
            <select name="mengajar_id" id="">
                @foreach ($mengajar as $m)
                    @if ($nilai->mengajar_id == $m->id)
                        <option value="{{ $m->id }}" selected>{{ $m->guru->nama_guru }} - {{ $m->mapel->nama_mapel }}
                        </option>
                    @else
                        <option value="{{ $m->id }}">{{ $m->guru->nama_guru }} - {{ $m->mapel->nama_mapel }}</option>
                    @endif
                @endforeach
            </select>

            <select name="siswa_id" id="">
                @foreach ($siswa as $s)
                    @if ($nilai->siswa_id == $s->id)
                        <option value="{{ $s->id }}" selected>{{ $s->nama_siswa }}</option>
                    @else
                        <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                    @endif
                @endforeach
            </select>

            <label for="uh">UH</label>
            <input type="number" name="uh" id="uh" min="1" max="100" required value="{{ $nilai->uh }}">

            <label for="uts">UTS</label>
            <input type="number" name="uts" id="uts" min="1" max="100" required value="{{ $nilai->uts }}">

            <label for="uas">UAS</label>
            <input type="number" name="uas" id="uas" min="1" max="100" required value="{{ $nilai->uas }}">

            <button class="button-submit" type="submit">Simpan Perubahan</button>
        </form>
    </div>
@endsection
