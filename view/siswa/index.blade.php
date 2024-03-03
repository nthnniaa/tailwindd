@extends('layout.main')
@section('content')
    <center>
        <h2>List Data Siswa</h2>
        <a href="/siswa/create" class="button-primary">[+] Tambah Data</a>

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
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->kelas->kelas }} {{ $item->kelas->jurusan }} {{ $item->kelas->rombel }}</td>
                        <td>{{ $item->password }}</td>
                        <td>
                            <a href="/siswa/edit/{{ $item->id }}" class="button-warning">Edit</a>
                            <a href="/siswa/destroy/{{ $item->id }}" class="button-danger"
                                onclick="return confirm('Yakin Hapus?')">Delete</a>
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
    </center>
@endsection
