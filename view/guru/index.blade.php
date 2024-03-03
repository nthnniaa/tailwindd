@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA GURU</h2>
            <a href="/guru/create" class="button-add">Tambah Data</a>
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
                        <th>NIP</th>
                        <th>NAMA GURU</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $guru as $g )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->nip }}</td>
                            <td>{{ $g->nama_guru }}</td>
                            <td>{{ $g->jk == 'L' ? 'Laki-laki' :'Perempuan' }}</td>
                            <td>{{ $g->alamat }}</td>
                            <td>{{ $g->password }}</td>
                            <td style="text-align: center">
                                <a href="/guru/edit/{{ $g->id }}" class="button-warning">EDIT</a>
                                <a href="/guru/destroy/{{ $g->id }}" class="button-danger" onclick="return confirm('Yakin Hapus Data?')">HAPUS</a>
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
