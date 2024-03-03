@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MAPEL</h2>
            <a href="/mapel/create" class="button-add">Tambah Data</a>
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
                        <th>MATA PELAJARAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $mapel as $m )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td style="text-align: center">
                                <a href="/mapel/edit/{{ $m->id }}" class="button-warning">EDIT</a>
                                <a href="/mapel/destroy/{{ $m->id }}" class="button-danger" onclick="return confirm('Yakin Hapus Data?')">HAPUS</a>
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
