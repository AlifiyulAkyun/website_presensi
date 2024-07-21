<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Presensi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dashboard()
    {
        $mataKuliah = MataKuliah::where('dosen_id', auth()->user()->dosen->id)->get();
        return view('dosen.dashboard', compact('mataKuliah'));
    }

    public function mataKuliahIndex()
    {
        $mataKuliah = MataKuliah::where('dosen_id', auth()->user()->dosen->id)->get();
        return view('dosen.mata_kuliah.index', compact('mataKuliah'));
    }

    public function mataKuliahCreate()
    {
        return view('dosen.mata_kuliah.create');
    }

    public function mataKuliahStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        MataKuliah::create([
            'nama' => $request->nama,
            'dosen_id' => auth()->user()->dosen->id,
        ]);

        return redirect()->route('dosen.mata_kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function mataKuliahEdit(MataKuliah $mataKuliah)
    {
        return view('dosen.mata_kuliah.edit', compact('mataKuliah'));
    }

    public function mataKuliahUpdate(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $mataKuliah->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('dosen.mata_kuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function mataKuliahDestroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect()->route('dosen.mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }

    public function mahasiswaIndex(MataKuliah $mataKuliah)
    {
        $mahasiswa = Mahasiswa::all();
        return view('dosen.mahasiswa.index', compact('mataKuliah', 'mahasiswa'));
    }

    public function mahasiswaStore(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
        ]);

        $mataKuliah->mahasiswa()->attach($request->mahasiswa_id);

        return redirect()->route('dosen.mahasiswa.index', $mataKuliah)->with('success', 'Mahasiswa berhasil ditambahkan ke mata kuliah.');
    }

    public function mahasiswaDestroy(MataKuliah $mataKuliah, Mahasiswa $mahasiswa)
    {
        $mataKuliah->mahasiswa()->detach($mahasiswa->id);
        return redirect()->route('dosen.mahasiswa.index', $mataKuliah)->with('success', 'Mahasiswa berhasil dihapus dari mata kuliah.');
    }
    public function __construct()
    {
    $this->middleware('role:dosen');
    }
    public function presensiIndex(MataKuliah $mataKuliah)
    {
    $mahasiswa = $mataKuliah->mahasiswa;
    return view('dosen.presensi.index', compact('mataKuliah', 'mahasiswa'));
    }

    public function presensiStore(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'mahasiswa' => 'required|array',
            'mahasiswa.*' => 'exists:mahasiswas,id',
            'tanggal' => 'required|date',
        ]);

        $waktuHadir = $request->tanggal . ' ' . now()->format('H:i:s');

        foreach ($request->mahasiswa as $mahasiswaId) {
            Presensi::create([
                'mahasiswa_id' => $mahasiswaId,
                'mata_kuliah_id' => $mataKuliah->id,
                'waktu_hadir' => $waktuHadir,
            ]);
        }

        return redirect()->route('dosen.presensi.index', $mataKuliah)->with('success', 'Presensi berhasil dicatat.');
    }
}