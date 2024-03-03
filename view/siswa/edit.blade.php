@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Ubah Data Siswa</h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger" align="center">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/siswa/update/{{ $siswa->id }}" method="post">
            @csrf
            <label for="nisp">NIS</label>
            <input type="text" name="nis" id="nis" required value="{{ $siswa->nis }}">

            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" required value="{{ $siswa->nama_siswa }}">

            <label for="jk">Jenis Kelamin</label>
            <input type="radio" name="jk" id="jk" value="L" {{ $siswa->jk == 'L' ? 'checked' : '' }}>
            Laki-laki
            <input type="radio" name="jk" id="jk" value="P" {{ $siswa->jk == 'P' ? 'checked' : '' }}>
            Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10" required>{{ $siswa->alamat }}</textarea>


            <label for="kelas">Kelas</label>
            <select name="kelas_id" id="kelas">
                @foreach ($kelas as $k)
                    @if ($siswa->kelas_id == $k->id)
                        <option value="{{ $k->id }}" selected>{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}
                        </option>
                    @else
                        <option value="{{ $k->id }}">{{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}
                        </option>
                    @endif
                @endforeach
            </select>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required value="{{ $siswa->password }}">

            <button class="button-submit" type="submit">Simpan Perubahan</button>
        </form>
    </div>
@endsection
