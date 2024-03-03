@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Ubah Data Kelas</h2>
        @if (session('error'))
            <p class="text-danger" align="center">{{ session('error') }}</p>
        @endif

        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                @foreach ($tingkat_kelas as $t)
                    @if ($kelas->kelas == $t)
                        <option value="{{ $t }}" selected>{{ $t }}</option>
                    @else
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endif
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                @foreach ($jurusan as $j)
                    @if ($kelas->jurusan == $j)
                        <option value="{{ $j }}" selected>{{ $j }}</option>
                    @else
                        <option value="{{ $j }}">{{ $j }}</option>
                    @endif
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" id="" required min="1" max="100" value="{{ $kelas->rombel }}">

            <button class="button-submit" type="submit">Simpan Perubahan</button>
        </form>
    </div>
@endsection
