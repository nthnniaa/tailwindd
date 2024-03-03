<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = ['DKV', 'RPL', 'TKJ', 'SIJA', 'BKP', 'DPIB', 'TP', 'TFLM', 'TKR', 'TOI'];
        $tingkat_kelas = ['10', '11', '12', '13'];
        return view('kelas.create', [
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required', 'numeric'],
        ]);

        $cek_kelas = Kelas::firstOrNew($data_kelas);
        if ($cek_kelas->exists) {
            return back()->with('error', "Kelas Telah Tersedia");
        } else {
            Kelas::create($data_kelas);
            return redirect('/kelas/index')->with('success', 'Yayy!! Data Berhasil di Tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        $jurusan = ['DKV', 'RPL', 'TKJ', 'SIJA', 'BKP', 'DPIB', 'TP', 'TFLM', 'TKR', 'TOI'];
        $tingkat_kelas = ['10', '11', '12', '13'];
        return view('kelas.edit', [
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan,
            'kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {

        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required'],
        ]);

 
        $cek_kelas = Kelas::firstOrNew($data_kelas);
        if ($cek_kelas->exists) {
            return back()->with('error', "Kelas Telah Tersedia");
        } else {
            $kelas->update($data_kelas);
            return redirect('/kelas/index')->with('success', 'Yayy!! Data Berhasil di Ubah');

        }
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();

        $kelas_dipakai = "$kelas->kelas $kelas->jurusan $kelas->rombel";

        if ($siswa) {
            return back()->with('error', "$kelas_dipakai masih digunakan di menu siswa!");
        }

        if ($mengajar) {
            return back()->with('error', "$kelas_dipakai masih digunakan di menu mengajar!");
        }

        $kelas->delete();

        return back()->with('success', 'Data Kelas Berhasil Di Hapus!');

        $cek_mengajar = Mengajar::where('kelas_id', $kelas->id)->first();
        if ($cek_mengajar) {
            return back()->with('error', 'Oppss!! Data Masih Digunakan Pada Menu Mengajar');
        } else {
            $kelas->delete();
            return back()->with('success', 'Yayy!! Data Berhasil di Hapus');
        }
    }
}
