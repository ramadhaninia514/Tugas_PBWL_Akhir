<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Admin</title>
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <style>
    body {
      background-image: url('{{ asset("img/bg.jpg") }}');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      background-attachment: fixed;
    }

    .login-box {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 35px;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 400px;
    }

    .login-box img {
      width: 70px;
      margin: 0 auto 15px auto;
      display: block;
    }

    .login-box h2 {
      text-align: center;
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #333;
    }

    .login-box p {
      text-align: center;
      color: #666;
      font-size: 0.9rem;
      margin-bottom: 25px;
    }

    .form-label {
      font-weight: 500;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    .btn-secondary {
      width: 100%;
      margin-top: 10px;
      background-color: #6c757d;
      border: none;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
    }

    footer {
      text-align: center;
      font-size: 0.75rem;
      color: #999;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <img src="{{ asset('img/edulab.png') }}" alt="Logo Kominfo">
    <h2>Login Admin</h2>
    <p>Sistem Informasi Absensi<br>Tentor Bimbingan Belajar EDULAB</p>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required autofocus>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Masuk</button>
    </form>

    {{-- Tombol kembali ke halaman utama --}}
    <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Website</a>

    <footer>
      &copy; {{ date('Y') }} EDULAB Binjai
    </footer>
  </div>

</body>
</html>
