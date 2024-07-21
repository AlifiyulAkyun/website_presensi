@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Mahasiswa</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Presensi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Mata Kuliah</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Hadir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($presensi as $p)
                                <tr>
                                    <td>{{ $p->mataKuliah->nama }}</td>
                                    <td>{{ $p->waktu_hadir->format('d-m-Y') }}</td>
                                    <td>{{ $p->waktu_hadir->format('H:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection