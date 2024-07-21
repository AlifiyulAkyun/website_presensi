@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            
            @if(Auth::user()->role == 'dosen')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('mata-kuliah*') ? 'active' : '' }}" href="{{ route('mata-kuliah.index') }}">
                <i class="fas fa-book me-2"></i> Mata Kuliah
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('mata-kuliah/create') ? 'active' : '' }}" href="{{ route('mata-kuliah.create') }}">
                <i class="fas fa-plus me-2"></i> Tambah Mata Kuliah
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link {{ Request::is('mata-kuliah') ? 'active' : '' }}" href="{{ route('mata-kuliah.index') }}">
                <i class="fas fa-book me-2"></i> Mata Kuliah Saya
            </a>
        </li>
    @endif
         
            <li class="nav-item">
                <a class="nav-link {{ Request::is('presensi') ? 'active' : '' }}" href="{{ route('presensi.index') }}">
                    <i class="fas fa-chart-bar me-2"></i> Presensi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> {{ __('Logout') }}
                </a>
            </li>
        </ul>
    </div>
</div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
    <input type="hidden" name="redirect_to" value="{{ route('login') }}">
</form>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

           

            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle me-2"></i> {{ __('You are logged in!') }}
            </div>

            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-calendar-check me-2"></i>Presensi Hari Ini</h5>
                            <p class="card-text">Total: 3 Mata Kuliah</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-tasks me-2"></i>Tugas Mendatang</h5>
                            <p class="card-text">2 tugas perlu diselesaikan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-warning text-dark h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-bell me-2"></i>Pengumuman</h5>
                            <p class="card-text">3 pengumuman baru</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Jadwal Hari Ini
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">08:00 - 09:40 | Matematika Diskrit</li>
                            <li class="list-group-item">10:00 - 11:40 | Pemrograman Web</li>
                            <li class="list-group-item">13:00 - 14:40 | Basis Data</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Pengumuman Terbaru
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Jadwal UTS Semester Genap 2023/2024</li>
                            <li class="list-group-item">Pembaruan Sistem Informasi Akademik</li>
                            <li class="list-group-item">Seminar Online: "Teknologi AI dalam Pendidikan"</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@section('styles')
<style>
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }
    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }
    .sidebar .nav-link.active {
        color: #007bff;
    }
</style>
@endsection

@section('scripts')
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
@endsection