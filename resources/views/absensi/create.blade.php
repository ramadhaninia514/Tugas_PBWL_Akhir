@extends('layouts.app') @section('content')
@stack('scripts')
<div class="attendance-container">
    <h2>Formulir Absensi Harian</h2>
    <p>Pegawai Non-ASN - Dinas Kominfo Kota Binjai</p>

    {{-- Notifikasi Success --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi Error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- IMPORTANT: Remove enctype="multipart/form-data" --}}
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Absen</label>
            {{-- Set initial value with JavaScript --}}
            <input type="date" class="form-control" id="tanggal" name="tanggal" required readonly>
        </div>

        <div class="mb-3">
            <label for="jam_datang" class="form-label">Jam Datang</label>
            {{-- Set initial value with JavaScript --}}
            <input type="time" class="form-control" id="jam_datang" name="jam_datang" required readonly>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status Kehadiran</label>
            <select class="form-select" id="status" name="status" required>
                <option value="" disabled selected>Pilih status</option>
                <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Izin" {{ old('status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="Tanpa Keterangan" {{ old('status') == 'Tanpa Keterangan' ? 'selected' : '' }}>Tanpa Keterangan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan Tambahan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Opsional">{{ old('keterangan') }}</textarea>
        </div>

        <div class="mb-3 text-center">
            <label class="form-label">Foto Muka</label>
            <video id="video" autoplay style="width: 100%; max-width: 400px; display: block; margin: 0 auto;"></video>
            <canvas id="canvas" style="display: none;"></canvas> {{-- Add a canvas element --}}
            <img id="photo-preview" alt="Preview Foto" style="width: 100%; max-width: 400px; display: none; margin: 10px auto;">
            <br>
            <button type="button" class="btn btn-secondary mt-2" id="capture">Ambil Foto</button>
        </div>

        <input type="hidden" name="foto_muka" id="foto_muka" value="">

        <button type="submit" class="btn btn-success">Kirim Absensi</button>
    </form>

    <footer>&copy; {{ date('Y') }} Dinas Kominfo Kota Binjai</footer>
</div>

@endsection

@push('scripts') {{-- Assuming you have a stack for scripts in your layout --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photoPreview = document.getElementById('photo-preview');
        const captureButton = document.getElementById('capture');
        const fotoMukaInput = document.getElementById('foto_muka');

        // Set current date and time
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        document.getElementById('tanggal').value = `${year}-${month}-${day}`;

        const hours = String(today.getHours()).padStart(2, '0');
        const minutes = String(today.getMinutes()).padStart(2, '0');
        document.getElementById('jam_datang').value = `${hours}:${minutes}`;


        // Access webcam
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.error("Error accessing webcam: ", err);
                    alert("Gagal mengakses kamera. Pastikan Anda mengizinkan akses kamera.");
                });
        } else {
            alert("Peramban Anda tidak mendukung akses kamera.");
        }

        captureButton.addEventListener('click', function() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Get image data as Base64
            const dataURL = canvas.toDataURL('image/png'); // You can use 'image/jpeg' for smaller size
            photoPreview.src = dataURL;
            photoPreview.style.display = 'block';
            video.style.display = 'none'; // Hide video after capture

            // Store the Base64 data in the hidden input
            fotoMukaInput.value = dataURL;
        });

        // Optional: Re-show video if photo is cleared or page is reset
        // You might want a "Retake Photo" button
    });
</script>
@endpush