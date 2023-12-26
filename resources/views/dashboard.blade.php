@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header mt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <!-- Navbar user -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Daftar menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center">
                                <h2 class="m-0 text-dark">Selamat Datang,</h2>
                                <h2 class="m-0 text-dark ml-2">{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Grafik Statistik -->
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Statistik Jumlah Mahasiswa per Jurusan</h3>
                </div>
                <div class="card-body">
                    <canvas id="mahasiswaJurusanChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Statistik Jumlah Mata Kuliah</h3>
                </div>
                <div class="card-body">
                    <canvas id="mataKuliahChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.content -->

<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data Grafik Jumlah Mahasiswa per Jurusan
    var mahasiswaJurusanCtx = document.getElementById('mahasiswaJurusanChart').getContext('2d');
    var mahasiswaJurusanChart = new Chart(mahasiswaJurusanCtx, {
        type: 'bar',
        data: {
            labels: ['Jurusan A', 'Jurusan B', 'Jurusan C', 'Jurusan D'],
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: [120, 80, 150, 100],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Data Grafik Jumlah Mata Kuliah
    var mataKuliahCtx = document.getElementById('mataKuliahChart').getContext('2d');
    var mataKuliahChart = new Chart(mataKuliahCtx, {
        type: 'bar',
        data: {
            labels: ['Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika', 'Desain Komunikasi Visual'],
            datasets: [{
                label: 'Jumlah Mata Kuliah',
                data: [30, 25, 20, 15],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
