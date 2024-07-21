@extends('layouts.app')

@section('title', 'Dashboard Dosen')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Dosen</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-book me-2"></i>Mata Kuliah</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('dosen.mata_kuliah.create') }}" class="btn btn-success mb-3">
                        <i class="fas fa-plus me-1"></i>Tambah Mata Kuliah
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Mata Kuliah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mataKuliah as $mk)
                                <tr>
                                    <td>{{ $mk->nama }}</td>
                                    <td>
                                        <a href="{{ route('dosen.mata_kuliah.edit', $mk) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('dosen.mahasiswa.index', $mk) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-users"></i> Daftar Mahasiswa
                                        </a>
                                        <a href="{{ route('dosen.presensi.index', $mk) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-clipboard-check"></i> Presensi
                                        </a>
                                        <form action="{{ route('dosen.mata_kuliah.destroy', $mk) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
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