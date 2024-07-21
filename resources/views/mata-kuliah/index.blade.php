<!-- resources/views/mata-kuliah/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <main class="col-md-12 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ Auth::user()->role == 'dosen' ? 'Mata Kuliah' : 'Mata Kuliah Saya' }}</h1>
                @if(Auth::user()->role == 'dosen')
                    <a href="{{ route('mata-kuliah.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Jadwal</th>
                            @if(Auth::user()->role == 'dosen')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MK001</td>
                            <td>Web Dasar</td>
                            <td>3</td>
                            <td>1</td>
                            <td>Senin 08:00 - 10:00</td>
                            @if(Auth::user()->role == 'dosen')
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td>MK002</td>
                            <td>Pemrograman Web</td>
                            <td>4</td>
                            <td>2</td>
                            <td>Rabu 10:00 - 12:00</td>
                            @if(Auth::user()->role == 'dosen')
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td>MK003</td>
                            <td>Basis Data</td>
                            <td>3</td>
                            <td>2</td>
                            <td>Jumat 08:00 - 10:00</td>
                            @if(Auth::user()->role == 'dosen')
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td>MK004</td>
                            <td>Bahasa Inggris</td>
                            <td>2</td>
                            <td>1</td>
                            <td>Kamis 10:00 - 12:00</td>
                            @if(Auth::user()->role == 'dosen')
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
