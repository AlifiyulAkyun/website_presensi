@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Mata Kuliah</h1>
            </div>

            <form action="{{ route('mata-kuliah.update', $mataKuliah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{ $mataKuliah->kode }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $mataKuliah->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="sks" class="form-label">SKS</label>
                    <input type="number" class="form-control" id="sks" name="sks" value="{{ $mataKuliah->sks }}" required>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" value="{{ $mataKuliah->semester }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </main>
    </div>
</div>
@endsection