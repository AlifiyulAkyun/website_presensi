@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Detail Mata Kuliah</h1>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $mataKuliah->nama }}</h5>
                    <p class="card-text">
                        <strong>Kode:</strong> {{ $mataKuliah->kode }}<br>
                        <strong>SKS:</strong> {{ $mataKuliah->sks }}<br>
                        <strong>Semester:</strong> {{ $mataKuliah->semester }}
                    </p>
                    @if(Auth::user()->role == 'dosen')
                        <a href="{{ route('mata-kuliah.edit', $mataKuliah->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mata-kuliah.destroy', $mataKuliah->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                        </form>
                    @endif
                </div>
            </div>
        </main>
    </div>
</div>
@endsection