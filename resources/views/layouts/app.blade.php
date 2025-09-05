<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Blog System')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-custom { background-color: #cfe8ff; }
    .btn-primary, .nav-link.btn-primary { background-color: #7db8ff; border-color: #7db8ff; }
    .nav-link { color: #034a87 !important; }
    .navbar-brand { color: #034a87 !important; font-weight:700; }
    body { padding-top: 70px; }
  </style>
</head>
<body>
  @include('partials.navbar')
  <div class="container mt-4">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
