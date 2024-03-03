<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mengajar.index', [
            'mengajar' => Mengajar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mengajar.create', [
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
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
        $data_mengajar = $request->validate([
            'guru_id' => ['required'],
            'mapel_id' => ['required'],
            'kelas_id' => ['required']
        ]);

        $cek_mengajar = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
        if ($cek_mengajar) {
            return back()->with('error', "Mengajar Telah Tersedia");
        } else {
            Mengajar::create($data_mengajar);
            return redirect('/mengajar/index')->with('success', 'Yayy!! Data Berhasil di Tambahkan');
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
    public function edit(Mengajar $mengajar)
    {
        return view('mengajar.edit', [
            'mengajar' => $mengajar,
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mengajar $mengajar)
    {
        $data_mengajar = $request->validate([
            'guru_id' => ['required', 'numeric'],
            'mapel_id' => ['required', 'numeric'],
            'kelas_id' => ['required','numeric']
        ]);

        if (
            $mengajar->guru_id != $request->guru_id || $mengajar->mapel_id != $request->mapel_id || $mengajar->kelas_id !=
            $request->kelas_id
        ) {
            $cek_mengajar = Mengajar::where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->first();
            if ($cek_mengajar) {
                return back()->with('error', "Mengajar Telah Tersedia");
            }
        }
        $mengajar->update($data_mengajar);
        return redirect('/mengajar/index')->with('success', 'Yayy!! Data Berhasil di Ubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mengajar $mengajar)
    {
        $cek_nilai = Nilai::where('mengajar_id', $mengajar->id)->first();
        if ($cek_nilai) {
            return back()->with('error', 'Oppss!! Data Masih Digunakan Pada Menu Nilai');
        } else {
            $mengajar->delete();
            return back()->with('success', 'Yayy!! Data Berhasil di Hapus');
        }
    }
}
