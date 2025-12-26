@extends('layouts.app')

@section('content')
<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
    html, body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #eaf3fb;
        height: 100%;
        overflow-x: hidden;
    }

    .container-rekap {
        width: 100%;
        min-height: 100vh;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background: linear-gradient(180deg, #66b3ff, #3399ff);
        color: white;
        padding: 25px 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1000;
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
        overflow-x: auto;
        width: calc(100% - 250px);
    }

    .card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
        margin-top: 0;
        margin-bottom: 20px;
        color: #003366;
        font-weight: 600;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 12px 18px;
        border: 1px solid #d0d7de;
        font-size: 14px;
    }

    th {
        background: #3399ff;
        color: white;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f0f6fc;
    }

    /* Pagination style */
    .pagination {
        margin-top: 20px;
        justify-content: center;
    }
</style>

<div class="container-rekap">
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
            <h3>Rekapitulasi Absensi Tentor</h3>

            <!-- Form Filter -->
            <form method="GET" action="{{ route('admin.rekap') }}" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
                <input
                    type="text"
                    name="nama"
                    placeholder="Cari Nama..."
                    value="{{ request('nama') }}"
                    style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;"
                >
                <input
                    type="date"
                    name="tanggal"
                    value="{{ request('tanggal') }}"
                    style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px;"
                >
                <button
                    type="submit"
                    style="padding: 8px 16px; background-color: #3399ff; color: white; border: none; border-radius: 4px; cursor: pointer;"
                >
                    Cari
                </button>
                <a
                    href="{{ route('admin.rekap') }}"
                    style="padding: 8px 16px; background-color: #777; color: white; text-decoration: none; border-radius: 4px;"
                >
                    Reset
                </a>
            </form>

            <!-- Tabel Rekap -->
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Foto</th>   
                    </tr>
                </thead>
                    <tbody>
                    @foreach($dataMasuk as $masuk)
                        @php
                            $pulang = $dataPulang->firstWhere('nama', $masuk->nama);
                        @endphp
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($masuk->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $masuk->nama }}</td>
                            <td>{{ $masuk->jam_datang }}</td>
                            <td>{{ $pulang->jam_pulang ?? '-' }}</td>
                            <td>{{ $masuk->status }}</td>
                            <td>{{ $masuk->keterangan ?? '-' }}</td>

                            <!-- FOTO KEHADIRAN -->
                            <td style="text-align:center;">
                                @if($masuk->foto_muka)
                                    <img 
                                        src="{{ $masuk->foto_muka }}"
                                        width="60"
                                        height="60"
                                        style="
                                            border-radius: 50%;
                                            object-fit: cover;
                                            border: 2px solid #3399ff;
                                            cursor: pointer;
                                        "
                                        onclick="previewFoto('{{ $masuk->foto_muka }}')"
                                    >
                                @else
                                    <span style="color:#999;">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            <!-- Modal Preview Foto -->
            <div id="fotoModal" style="
                display:none;
                position:fixed;
                top:0; left:0;
                width:100%; height:100%;
                background:rgba(0,0,0,0.6);
                justify-content:center;
                align-items:center;
                z-index:2000;
            ">
                <div style="background:white; padding:20px; border-radius:10px;">
                    <img id="fotoPreview" style="max-width:300px; border-radius:10px;">
                    <br><br>
                    <button onclick="tutupFoto()" style="
                        padding:8px 16px;
                        border:none;
                        background:#3399ff;
                        color:white;
                        border-radius:5px;
                    ">
                        Tutup
                    </button>
                </div>
            </div>

            <!-- Pagination -->
            <div>
                {{ $dataMasuk->links('pagination::bootstrap-5') }}
            </div>
            <script>
                function previewFoto(src) {
                    document.getElementById('fotoPreview').src = src;
                    document.getElementById('fotoModal').style.display = 'flex';
                }

                function tutupFoto() {
                    document.getElementById('fotoModal').style.display = 'none';
                }
                </script>

        </div>
    </div>
</div>
@endsection
