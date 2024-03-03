@extends('layout.main')
@section('content')
    <center>
        <h2>List Data Nilai</h2>
        @if (session('role') == 'guru')
            <a href="/nilai/create/{{ $idKelas }}" class="button-primary">[+] Tambah Data</a>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>UH</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NA</th>
                    @if (session('role') == 'guru')
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($nilai as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mengajar->guru->nama_guru }}</td>
                        <td>{{ $item->mengajar->mapel->nama_mapel }}</td>
                        <td>{{ $item->siswa->nama_siswa }}</td>
                        <td>{{ $item->mengajar->kelas->kelas }} {{ $item->mengajar->kelas->jurusan }}
                            {{ $item->mengajar->kelas->rombel }}</td>
                        <td>{{ $item->uh }}</td>
                        <td>{{ $item->uts }}</td>
                        <td>{{ $item->uas }}</td>
                        <td>{{ $item->na }}</td>
                        @if (session('role') == 'Guru')
                            <td>
                                <a href="/nilai/edit/{{ $idKelas }}/{{ $item->id }}"
                                    class="button-warning">Edit</a>
                                <a href="/nilai/destroy/{{ $item->id }}" class="button-danger"
                                    onclick="return confirm('Yakin Hapus?')">Delete</a>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" align="center">
                            Data Tidak Tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </center>
@endsection
