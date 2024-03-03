@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MENGAJAR</h2>
            <a href="/mengajar/create" class="button-primary">Tambah Data</a>
            @if (session('success'))
                <div class="alert alert-success">
                    <span class="closebtn" id="closeBtn">&times;</span>{{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <span class="closebtn" id="closeBtn">&times;</span>{{ session('error') }}
                </div>
            @endif
            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>GURU</th>
                        <th>MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $mengajar as $meng )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $meng->guru->nama_guru }}</td>
                            <td>{{ $meng->mapel->nama_mapel }}</td>
                            <td>{{ $meng->kelas->kelas }} {{ $meng->kelas->jurusan }} {{ $meng->kelas->rombel }}</td>
                            <td style="text-align: center">
                                <a href="/mengajar/edit/{{ $meng->id }}" class="button-warning">EDIT</a>
                                <a href="/mengajar/destroy/{{ $meng->id }}" class="button-danger" onclick="return confirm('Yakin Hapus Data?')">HAPUS</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" align="center">
                                Data Tidak Tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </b>
    </center>
@endsection
