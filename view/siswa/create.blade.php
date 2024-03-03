@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Siswa</h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger" align="center">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/siswa/store" method="post">
            @csrf
            <label for="nisp">NIS</label>
            <input type="text" name="nis" id="nis" required>

            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" required>

            <label for="jk">Jenis Kelamin</label>
            <input type="radio" name="jk" id="jk" value="L"> Laki-laki
            <input type="radio" name="jk" id="jk" value="P"> Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10" required></textarea>


            <label for="kelas">Kelas</label>
            <select name="kelas_id" id="kelas">
                <option value="" selected>Pilih Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}
                    </option>
                @endforeach
            </select>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection
