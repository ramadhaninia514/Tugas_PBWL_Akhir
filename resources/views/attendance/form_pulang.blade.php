@extends('layouts.app')

@section('content')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    body {
        background: #f2f7fb;
        font-family: 'Segoe UI', sans-serif;
        padding: 30px;
    }

    .attendance-container {
        max-width: 750px;
        margin: auto;
        background: white;
        border-radius: 18px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border-top: 6px solid #0077cc;
    }

    .attendance-container h2 {
        font-weight: 700;
        color: #0077cc;
        margin-bottom: 10px;
        text-align: center;
    }

    .attendance-container p {
        color: #555;
        font-size: 14px;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group label {
        font-weight: 600;
        color: #444;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .btn-primary {
        background-color: #0077cc;
        border: none;
        border-radius: 12px;
        font-weight: bold;
        padding: 12px;
        width: 100%;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #005fa3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 14px;
        color: white;
    }

    .alert {
        border-radius: 10px;
    }

    #preview {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 3px solid #0077cc;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0, 119, 204, 0.2);
        margin-bottom: 15px;
        display: none;
    }

    video {
        width: 300px;
        height: 225px;
        border-radius: 12px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
        transform: scaleX(-1);
    }

    canvas {
        display: none;
    }

    .camera-box {
        text-align: center;
        padding: 15px;
        background: #f8fbff;
        border-radius: 15px;
        border: 1px dashed #0077cc;
        margin-bottom: 20px;
    }
</style>

<div class="attendance-container">
    <h2>Absensi Pulang </h2>
    <p>Tentor Bimbingan Belajar EDULAB</p>

    {{-- Alert Session --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('form.pulang.store') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="nama">Nama Tentor:</label>
            <select name="nama" id="nama" class="form-control select2" required>
                <option value="">-- Pilih Nama --</option>
                @foreach($users as $user)
                    <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>

               <div class="form-group mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="jam_pulang">Jam Pulang</label>
            <input type="time" class="form-control" name="jam_pulang" value="{{ date('H:i') }}" readonly>
        </div>

        <input type="hidden" name="status" value="Hadir">
        <input type="hidden" name="keterangan" value="Absen Pulang">


        <button type="submit" class="btn btn-primary">✅ Simpan </button>
    </form>
</div>

<!-- jQuery dan Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#nama').select2({
            placeholder: "Pilih Nama Pegawai",
            width: '100%'
        });
    });

    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const preview = document.getElementById('preview');
    const fotoInput = document.getElementById('foto_muka');
    const context = canvas.getContext('2d');

    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(error => {
            console.error("Kamera tidak bisa diakses: ", error);
            alert("Gagal mengakses kamera. Pastikan Anda mengizinkan akses kamera.");
        });

    function ambilFoto() {
        context.save();
        context.translate(canvas.width, 0);
        context.scale(-1, 1);
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        context.restore();

        const imageData = canvas.toDataURL('image/png');
        fotoInput.value = imageData;
        preview.src = imageData;
        preview.style.display = 'block';
    }
</script>
@endsection
