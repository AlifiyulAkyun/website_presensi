<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:mahasiswa');
    }

    public function dashboard()
    {
        $user = Auth::user();
        
        if (!$user || !$user->mahasiswa) {
            // Jika user tidak ditemukan atau bukan mahasiswa, redirect ke halaman lain
            return redirect()->route('home')->with('error', 'Akses tidak diizinkan.');
        }

        $presensi = Presensi::where('mahasiswa_id', $user->mahasiswa->id)
            ->with('mataKuliah')
            ->orderBy('waktu_hadir', 'desc')
            ->get();

        return view('mahasiswa.dashboard', compact('presensi'));
    }
}