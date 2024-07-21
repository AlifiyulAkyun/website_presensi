@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Presensi</h1>
    <p>Ini adalah halaman presensi dosen.</p>

    <!-- Tambahkan konten presensi di sini -->
    <div class="card mt-4">
        <div class="card-header">
            Daftar Presensi
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">08:00 - 09:40 | Matematika Diskrit - Hadir</li>
            <li class="list-group-item">10:00 - 11:40 | Pemrograman Web - Hadir</li>
            <li class="list-group-item">13:00 - 14:40 | Basis Data - Tidak Hadir</li>
        </ul>
    </div>
</div>
@endsection
