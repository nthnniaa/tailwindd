<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    function index()
    {
        if (session('role') == 'guru') {
            $kelasIds = Mengajar::where('guru_id', session('id'))->pluck('kelas_id')->toArray();
            $kelasId = Kelas::whereIn('id', $kelasIds)->get();
            return view('nilai.menu', [
                'kelas' => $kelasId
            ]);
        } else {
            $nilai = Nilai::where('siswa_id', session('id'))->get();
            return view('nilai.index', [
                'nilai' => $nilai
            ]);
        }
    }

    function show(Kelas $kelas)
    {
        $guruId = session('id');
        $kelasId = $kelas->id;
        $dataNilai = Nilai::whereHas('mengajar', function ($query) use ($guruId, $kelasId) {
            $query->where('guru_id', $guruId)->where('kelas_id', $kelasId);
        })->get();

        return view('nilai.index', [
            'nilai' => $dataNilai,
            'idKelas' => $kelasId
        ]);
    }

    function create(Kelas $kelas)
    {
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id', $kelas->id)->get();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        return view('nilai.create', [
            'mengajar' => $mengajar,
            'siswa' => $siswa,
            'idKelas' => $kelas->id
        ]);
}

    function store(Request $request, Kelas $kelas)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required'],
            'uts' => ['required'],
            'uas' => ['required'],
        ]);
        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        $cek_nilai = Nilai::where('mengajar_id', $request->mengajar_id)->where('siswa_id', $request->siswa_id)->first();
        if ($cek_nilai) {
            return back()->with('error', 'Oppss!! Nilai Telah Tersedia');
        } else {
            Nilai::create($data_nilai);
            return redirect("/nilai/show/$kelas->id")->with('success', 'Yayy!! Data Berhasil di Tambahkan');
        }
    }

    function edit(Kelas $kelas, Nilai $nilai)
    {
        $mengajar = Mengajar::where('guru_id', session('id'))->where('kelas_id', $kelas->id)->get();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        return view('nilai.edit', [
            'nilai' => $nilai,
            'mengajar' => $mengajar,
            'siswa' => $siswa,
            'idKelas' => $kelas->id
        ]);
    }

    function update(Request $request, Kelas $kelas, Nilai $nilai)
    {
        $data_nilai = $request->validate([
            'mengajar_id' => ['required'],
            'siswa_id' => ['required'],
            'uh' => ['required'],
            'uts' => ['required'],
            'uas' => ['required'],
        ]);
        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);

        if ($nilai->mengajar_id != $request->mengajar_id || $nilai->siswa_id != $request->siswa_id || $nilai->uh != $request->uh || $nilai->uts != $request->uts || $nilai->uas != $request->uas) {
            $cek_nilai = Nilai::where('mengajar_id', $request->mengajar_id)->where('siswa_id', $request->siswa_id)->where('uh', $request->uh)->where('uts', $request->uts)->where('uas',$request->uas)->first();
            if ($cek_nilai) {
                return back()->with('error', 'Oppss!! Nilai Telah Tersedia');
            }
        }
        $nilai->update($data_nilai);
        return redirect("/nilai/show/$kelas->id")->with('success', 'Yayy!! Data Berhasil di Ubah');
    }

    function destroy(Nilai $nilai){
        $nilai->delete();
        return back()->with('success', "Yayy!! Data Berhasil di Hapus");
    }
}
