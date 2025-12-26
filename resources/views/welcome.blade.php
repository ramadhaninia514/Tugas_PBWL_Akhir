<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sistem Absensi Tentor - EDULAB Binjai2</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Apple Touch Icon -->
  <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('img/favicon.png') }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  
</head> 

<body class="index-page">

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


 <header id="header" class="header d-flex align-items-center fixed-top" 
  style="background: linear-gradient(135deg, #0059b3, #66b2ff); color: #ffffff; font-family: 'Segoe UI', sans-serif; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); z-index: 999;">
  
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <!-- Logo -->
    <a href="index.html" class="logo d-flex align-items-center me-auto text-white text-decoration-none">
      <img src="img/edulab.png" alt="Logo Kominfo" style="height: 40px; margin-right: 10px;">
      <h1 class="sitename mb-0" style="color: #ffffff;">SI-ABSEN EDULAB</h1>
    </a>

    <!-- Menu -->
    <nav id="navmenu" class="navmenu d-flex align-items-center">
      <ul class="d-flex list-unstyled mb-0">
        <li><a href="#hero" class="nav-link px-3 text-white">Home</a></li>
        <li><a href="#about" class="nav-link px-3 text-white">Informasi</a></li>
        <li><a href="#footer" class="nav-link px-3 text-white">Kontak</a></li>
       <li><a href="{{ route('admin.login') }}" class="btn btn-outline-light ms-3 px-4 py-1 rounded-0" 
       style="border: 2px solid white;">Login</a></li>
      </ul>
      
      <!-- Toggle Mobile -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list text-white fs-3 ms-3"></i>
    </nav>

  </div>
</header>

  <main class="main">

    <!-- Hero Section -->
<section id="hero" class="hero section dark-background">
  <img src="{{ asset('img/hero-bg.jpg') }}" data-aos="fade-in">

  <div class="container d-flex flex-column align-items-center">
    <h2 data-aos="fade-up" data-aos-delay="100">Sistem Informasi Absensi Tentor di EDULAB Binjai</h2>
    <p data-aos="fade-up" data-aos-delay="200">Sistem ini digunakan untuk mencatat dan memantau kehadiran tentor dalam kegiatan mengajar di bimbingan belajar Edulab secara terkomputerisasi dan terstruktur</p>
    
    <!-- ✅ Tombol Absen Masuk & Pulang -->
    <div class="d-flex gap-3 mt-4" data-aos="fade-up" data-aos-delay="300">
    <a href="{{ route('form.masuk.store') }}" class="btn btn-success px-4 py-2 rounded">Absen Hadir</a>
    <a href="{{ route('form.pulang.store') }}" class="btn btn-danger px-4 py-2 rounded">Absen Pulang</a>
</div>

  </div>
</section>


<!-- =========================
      ABOUT (Rapi Tanpa Gambar/Video)
========================= -->
<section id="about" class="py-5" style="background: linear-gradient(180deg,#f6f9ff 0%,#ffffff 100%);">
  <div class="container">
    <div class="row g-5 align-items-center">

      <!-- Teks -->
      <div class="col-lg-12" data-aos="fade-up" data-aos-delay="50">
        <span class="badge rounded-pill px-3 py-2 mb-3" style="background:#e7f0ff; color:#0b5ed7;">
          Sistem Absensi Tentor EDULAB
        </span>
        <p class="mb-3">
         Sistem ini dirancang untuk mencatat dan memantau kehadiran tentor dalam kegiatan mengajar di bimbingan belajar Edulab secara terstruktur dan terkomputerisasi.
        </p>
        <p class="mb-4">
        Melalui pencatatan waktu kehadiran secara digital, sistem ini membantu pengelola Edulab dalam mengelola data kehadiran tentor secara lebih tertib dan efisien.
        </p>

        <!-- Keunggulan (grid rapi) -->
        <div class="row g-3">
          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="100">
            <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white h-100 feature-card">
              <div class="icon-badge me-3" data-bs-toggle="tooltip" title="Teknologi Face Recognition">
                <i class="bi bi-emoji-smile-upside-down"></i>
              </div>
              <div>
                <h6 class="mb-1">Absensi Mengajar Tentor</h6>
                <small class="text-muted">Pencatatan kehadiran tentor Edulab saat kegiatan mengajar.</small>
              </div>
            </div>
          </div>
          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="150">
            <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white h-100 feature-card">
              <div class="icon-badge me-3" data-bs-toggle="tooltip" title="Keamanan & Akses Data">
                <i class="bi bi-shield-check"></i>
              </div>
              <div>
                <h6 class="mb-1">Jadwal Mengajar</h6>
                <small class="text-muted">Pengelolaan jadwal mengajar tentor berdasarkan mata pelajaran.</small>
              </div>
            </div>
          </div>
          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white h-100 feature-card">
              <div class="icon-badge me-3" data-bs-toggle="tooltip" title="Pantau Harian">
                <i class="bi bi-speedometer2"></i>
              </div>
              <div>
                <h6 class="mb-1">Rekap Kehadiran</h6>
                <small class="text-muted">Laporan kehadiran tentor harian dan bulanan.</small>
              </div>
            </div>
          </div>
          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="250">
            <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white h-100 feature-card">
              <div class="icon-badge me-3" data-bs-toggle="tooltip" title="Operasional yang Mulus">
                <i class="bi bi-check2-circle"></i>
              </div>
              <div>
                <h6 class="mb-1">Akses Mudah</h6>
                <small class="text-muted">Antarmuka sederhana dan mudah digunakan.</small>
              </div>
            </div>
          </div>
        </div>

        <p class="mt-4 mb-0">
          Sistem ini dikembangkan untuk mendukung pengelolaan kehadiran tentor di bimbingan belajar Edulab berbasis teknologi informasi.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ================ 
      STYLE (Tanpa Gambar/Video)
================ -->
<style>
  /* Kapsul ikon */
  .icon-badge{
    display:inline-flex; align-items:center; justify-content:center;
    width:44px; height:44px; border-radius:50%;
    background:#e7f0ff; color:#0b5ed7; flex:0 0 44px;
    font-size:18px;
  }

  /* Kartu fitur */
  .feature-card{ transition: transform .25s ease, box-shadow .25s ease; }
  .feature-card:hover{ transform: translateY(-2px); box-shadow:0 .75rem 1.5rem rgba(0,0,0,.08); }
</style>



  </main>
<footer id="footer" class="footer text-white py-4" style="background: linear-gradient(135deg, #66aaff, #3366cc); font-family: 'Segoe UI', sans-serif; font-size: 0.95rem;">
  <div class="container" style="max-width: 1000px;">

    <!-- Baris Konten Footer -->
    <div class="row justify-content-between align-items-start">

      <!-- Kontak Kami -->
      <div class="col-md-6 col-lg-6 mb-3">
        <h6 class="fw-bold mb-2 text-white">Kontak Kami</h6>
        <ul class="list-unstyled mb-0 text-white">
          <li><i class="bi bi-geo-alt-fill me-2"></i>Jalan Ksatria No.38, Satria</li>
          <li><i class="bi bi-geo-fill me-2"></i>Binjai, Sumatera Utara 20714</li>
          <li><i class="bi bi-telephone-fill me-2"></i>(061) 123456</li>
          <li><i class="bi bi-envelope-fill me-2"></i>EDULAB.ac.id</li>
        </ul>
      </div>
    </div>

    <!-- Garis Bawah & Hak Cipta -->
    <div class="row mt-3 pt-3 border-top border-light">
      <div class="col text-center small text-white">
        &copy; {{ date('Y') }} EDULAB BINJAI. All rights reserved.
      </div>
    </div>

  </div>
</footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
