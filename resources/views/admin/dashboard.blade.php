@extends('layouts.app')

@section('content')
<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: 'Segoe UI', sans-serif;
        background-color: #eaf3fb;
        overflow-x: hidden;
    }

    .container-dashboard {
        display: flex;
        min-height: 100vh;
        width: 100%;
    }

    .sidebar {
        width: 250px;
        background: linear-gradient(180deg, #66b3ff, #3399ff);
        color: white;
        padding: 25px 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: fixed;
        height: 100vh;
        top: 0;
        left: 0;
    }

    .sidebar h2 {
        font-size: 22px;
        margin-bottom: 30px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 10px;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .sidebar a {
        color: white;
        display: flex;
        align-items: center;
        padding: 10px;
        margin-bottom: 10px;
        text-decoration: none;
        border-radius: 6px;
        transition: background-color 0.3s ease, padding-left 0.3s ease;
    }

    .sidebar a i {
        margin-right: 10px;
    }

    .sidebar a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        padding-left: 15px;
    }

    .logout-btn {
        background: none;
        border: none;
        color: white;
        padding: 10px;
        text-align: left;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .logout-btn i {
        margin-right: 10px;
    }

    .logout-btn:hover {
        background-color: rgba(255, 255, 255, 0.2);
        padding-left: 15px;
    }

    .main-content {
        margin-left: 250px;
        padding: 40px;
        flex: 1;
    }

    .card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        border-left: 6px solid #3399ff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 100%;
        margin-bottom: 30px;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .card h3 {
        margin-top: 0;
        margin-bottom: 15px;
        color: #003366;
        font-weight: 600;
    }

    .card p {
        margin: 0;
        color: #555;
    }

  .stats-row {
    display: flex;
    flex-wrap: nowrap; /* tidak melipat ke bawah */
    gap: 20px;
    margin-top: 20px;
    justify-content: space-between;
}

   .stat-card {
    flex: 1;
    min-width: 0; /* biar flex: 1 bisa bekerja optimal */
    border-radius: 12px;
    padding: 20px 25px;
    color: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 15px;
    transition: 0.3s ease;
    min-height: 120px; /* tinggi konsisten */
}

.stat-icon {
    font-size: 32px;
    opacity: 0.3;
    position: absolute;
    right: 15px;
    bottom: 10px;
}

.stat-content {
    z-index: 2;
}

.stat-card.total {
    background: linear-gradient(135deg, #007bff, #3399ff);
}

.stat-card.absen {
    background: linear-gradient(135deg, #28a745, #5cd65c);
}

.stat-card.belum {
    background: linear-gradient(135deg, #dc3545, #ff6b6b);
}

.stat-title {
    font-size: 16px;
    color: #fff;
    margin-bottom: 5px;
}

.stat-number {
    font-size: 28px;
    font-weight: bold;
    color: #fff;
}

</style>

<div class="container-dashboard">
    <div class="sidebar">
        <div>
            <h2>SI-ABSEN EDULAB</h2>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a href="{{ route('admin.rekap') }}"><i class="fas fa-file-alt"></i> Rekap Absensi</a>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <div class="main-content">
        <div class="card">
            <h3>Selamat Datang, Admin EDULEB BINJAI</h3>
            <p>Berikut adalah ringkasan data absensi Tentor hari ini.</p>
        </div>

       <div class="stats-row">
    <div class="stat-card total">
        <div class="stat-content">
            <div class="stat-title">Total Tentor</div>
            <div class="stat-number">{{ $totalPegawai }}</div>
        </div>
        <i class="fas fa-users stat-icon"></i>
    </div>
    <div class="stat-card absen">
        <div class="stat-content">
            <div class="stat-title">Sudah Absen Hari Ini</div>
            <div class="stat-number">{{ $sudahAbsen }}</div>
        </div>
        <i class="fas fa-user-check stat-icon"></i>
    </div>
    <div class="stat-card belum">
        <div class="stat-content">
            <div class="stat-title">Belum Absen</div>
            <div class="stat-number">{{ $belumAbsen }}</div>
        </div>
        <i class="fas fa-user-times stat-icon"></i>
    </div>
</div>

        </div>
    </div>
</div>
@endsection
