{{-- resources/views/layouts/app.blade.php --}}
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', config('app.name', 'Laravel'))</title>

  {{-- ถ้าใช้ Vite/Tailwind ให้เปิดบรรทัดนี้; ถ้าไม่ได้ใช้ ให้ลบบรรทัดนี้ทิ้ง --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- ตัวเลือก: ใช้ Bootstrap CDN ระหว่างเริ่มต้น --}}
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

  @stack('styles')
</head>
<body>
  <nav class="container py-3 d-flex gap-3">
    <a href="{{ url('/') }}">Home</a>

    @auth
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <form class="ms-auto" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0">Logout</button>
      </form>
    @else
      @if (Route::has('login'))
        <a class="ms-auto" href="{{ route('login') }}">Login</a>
      @endif
      @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
      @endif
    @endauth
  </nav>

  <main class="container py-4">
    @yield('content')
  </main>

  @stack('scripts')

  {{-- ถ้าใช้ Bootstrap CDN ให้เปิด JS นี้ด้วย --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>
