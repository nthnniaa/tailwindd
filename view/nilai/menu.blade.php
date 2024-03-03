@extends('layout.main')
@section('content')
    <div class="content-menu">
        @forelse ($kelas as $k)
            <div class="menu-kelas">
                <div class="kelas-list">
                    <a href="/nilai/show/{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}</a>
                </div>
            </div>
        @empty
            <h2>Anda Belum Mendapat Kelas & Mapel</h2>
        @endforelse
    </div>
@endsection
