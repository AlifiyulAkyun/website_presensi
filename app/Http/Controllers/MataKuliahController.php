<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MataKuliahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:admin,dosen')->except(['index', 'show']);
    }

    public function index()
    {
        $mataKuliahs = MataKuliah::with('dosen.user')->get();
        return view('mata-kuliah.index', compact('mataKuliahs'));
    }

    public function show(MataKuliah $mataKuliah)
    {
        return view('mata-kuliah.show', compact('mataKuliah'));
    }

    public function create()
    {
        $dosens = Dosen::with('user')->get();
        return view('mata-kuliah.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:mata_kuliahs',
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
            'dosen_id' => 'nullable|exists:dosens,id',
        ]);

        MataKuliah::create($validatedData);

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        $dosens = Dosen::with('user')->get();
        return view('mata-kuliah.edit', compact('mataKuliah', 'dosens'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mata_kuliahs,kode,' . $mataKuliah->id,
            'nama' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
            'dosen_id' => 'nullable|exists:dosens,id',
        ]);

        $mataKuliah->update($validated);

        Log::info('Updated MataKuliah: ', $mataKuliah->toArray());

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
