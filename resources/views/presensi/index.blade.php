@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Presensi Mahasiswa</h1>

    <div class="card">
        <div class="card-header">
            Daftar Presensi Hari Ini
        </div>

        <div class="card-body">
            @if($presensi->isEmpty())
                <p>Tidak ada data presensi untuk hari ini.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <!-- <th>Confident</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($presensi as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->label }}</td>
                            <td>{{ $p->datetime }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                <button class="btn btn-success btn-sm">Hadir</button>
                            </td>
                            <!-- <td>{{ $p->confident }}%</td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-sm {
        padding: .25rem .5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
    }
</style>
@endsection

@section('scripts')
<script>
    // Anda bisa menambahkan script JavaScript di sini jika diperlukan
</script>
@endsection