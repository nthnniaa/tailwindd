@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Ubah Data Mengajar</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/mengajar/update/{{ $mengajar->id }}" method="post">
            @csrf
            <label for="guru_id"><b>Guru</b></label>
            <select name="guru_id" id="guru_id">
                @foreach ($guru as $g)
                    @if ($mengajar->guru_id == $g->id)
                        <option value="{{ $g->id }}" selected>{{ $g->nama_guru }}</option>
                    @else
                        <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                    @endif
                @endforeach
            </select>

            <label for="mapel_id"><b>Mata Pelajaran</b></label>
            <select name="mapel_id" id="mapel_id">
                @foreach ($mapel as $m)
                    @if ($mengajar->mapel_id == $m->id)
                        <option value="{{ $m->id }}" selected>{{ $m->nama_mapel }}</option>
                    @else
                        <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                    @endif
                @endforeach
            </select>

            <label for="kelas_id"><b>Kelas</b></label>
            <select name="kelas_id" id="kelas_id">
                @foreach ($kelas as $k)
                    @if ($mengajar->kelas_id == $k->id)
                        <option value="{{ $k->id }}" selected>{{ $k->kelas }} {{ $k->jurusan }}
                            {{ $k->rombel }}</option>
                    @else
                        <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}
                        </option>
                    @endif
                @endforeach
            </select>

            <button type="submit" class="button-submit">Ubah</button>
        </form>
    </div>
@endsection
