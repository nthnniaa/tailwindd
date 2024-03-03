@extends('layout.main')
@section('content')
    <center>
        <h2>List Data Kelas</h2>
        <a href="/kelas/create" class="button-primary">[+] Tambah Data</a>

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
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Rombel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->rombel }}</td>
                        <td>
                            <a href="/kelas/edit/{{ $item->id }}" class="button-warning">Edit</a>
                            <a href="/kelas/destroy/{{ $item->id }}" class="button-danger"
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
